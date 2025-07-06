use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Google_Client;
use Google_Service_YouTube;

Route::post('/youtube/upload', function (Request $request) {
    $request->validate([
        'video' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    // Path to your client_secret.json
    $clientSecretPath = storage_path('app/google/client_secret.json');
    $accessTokenPath = storage_path('app/google/access_token.json');

    $client = new Google_Client();
    $client->setAuthConfig($clientSecretPath);
    $client->addScope(Google_Service_YouTube::YOUTUBE_UPLOAD);
    $client->setAccessType('offline');

    // Load access token
    if (file_exists($accessTokenPath)) {
        $accessToken = json_decode(file_get_contents($accessTokenPath), true);
        $client->setAccessToken($accessToken);
    } else {
        return response()->json(['error' => 'No access token found. Please authenticate first.'], 401);
    }

    if ($client->isAccessTokenExpired()) {
        return response()->json(['error' => 'Access token expired. Please refresh token.'], 401);
    }

    $youtube = new Google_Service_YouTube($client);

    $video = new Google_Service_YouTube_Video();
    $video->setSnippet(new Google_Service_YouTube_VideoSnippet([
        'title' => $request->title,
        'description' => $request->description ?? '',
        'categoryId' => '22', // People & Blogs
    ]));
    $video->setStatus(new Google_Service_YouTube_VideoStatus([
        'privacyStatus' => 'private'
    ]));

    $videoPath = $request->file('video')->getPathname();

    try {
        $chunkSizeBytes = 1 * 1024 * 1024; // 1MB
        $client->setDefer(true);

        $insertRequest = $youtube->videos->insert('status,snippet', $video);

        $media = new Google_Http_MediaFileUpload(
            $client,
            $insertRequest,
            'video/*',
            null,
            true,
            $chunkSizeBytes
        );
        $media->setFileSize(filesize($videoPath));

        $status = false;
        $handle = fopen($videoPath, "rb");
        while (!$status && !feof($handle)) {
            $chunk = fread($handle, $chunkSizeBytes);
            $status = $media->nextChunk($chunk);
        }
        fclose($handle);

        $client->setDefer(false);

        return response()->json(['success' => true, 'videoId' => $status['id']]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});