<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateNewsSlugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all news records
        $newsRecords = DB::table('news')->select('id', 'title')->get();

        foreach ($newsRecords as $news) {
            // Generate a slug based on the title
            $slug = Str::slug($news->title);

            // Ensure the slug is unique
            $existingSlugs = DB::table('news')->where('slug', 'LIKE', "{$slug}%")->pluck('slug');
            $count = $existingSlugs->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }

            // Update the record with the new slug
            DB::table('news')
                ->where('id', $news->id)
                ->update(['slug' => $slug]);
        }
    }
}