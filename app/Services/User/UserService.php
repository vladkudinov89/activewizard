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

        $collection = collect($data['results']);   //turn data into collection
        $chunks = $collection->chunk(10); //chunk into smaller pieces
        $chunks->toArray(); //convert chunk to array

//loop through chunks:
        foreach($chunks as $chunk)
        {
//            dd($chunk->toArray());
//            dd($chunk);

            foreach ($chunk as $item) {
//                dd($item['name']);
//                $name = $this->presenterName($item['name']);
                $item['name'] = $this->presenterName($item['name']);
                User::insert($item); //insert chunked data
            }

//            User::insert($chunk->toArray()); //insert chunked data
        }

//        dd(User::all());
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
