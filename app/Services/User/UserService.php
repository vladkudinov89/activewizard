<?php


namespace App\Services\User;


use App\User;
use Illuminate\Support\Facades\Http;

class UserService
{
    public function recordUsers()
    {
        $this->removeAllUser();

        $data = Http::get('https://randomuser.me/api/?results=100&gender=male&inc=gender,name,email')
            ->json();

        $collection = collect($data['results']);
        $chunks = $collection->chunk(10);
        $chunks->toArray();

        foreach($chunks as $chunk)
        {
            foreach ($chunk as $item) {
                $item['name'] = $this->presenterName($item['name']);
                User::insert($item); //insert chunked data
            }
        }
    }
    private function presenterName(array $name) : string
    {
        return
            $name['title'] . ' '. $name['first'] . ' '. $name['last']
            ;
    }

    private function removeAllUser(): void
    {
        User::truncate();
    }
}
