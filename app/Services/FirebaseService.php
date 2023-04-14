<?php

namespace App\Services;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;

class FirebaseService
{
    public static function connect()
    {
        $firestore = new FirestoreClient([
            'projectId' => 'smart-tashjeer',
            'keyFile' => json_decode(file_get_contents(storage_path('app/firebase/smart-tashjeer-firebase-adminsdk-crja9-a4dcadccec.json')), true)
        ]);

        return $firestore;
    }
}
