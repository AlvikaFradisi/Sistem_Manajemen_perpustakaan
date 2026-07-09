<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan direktori 'books' ada di disk public
        if (!Storage::disk('public')->exists('books')) {
            Storage::disk('public')->makeDirectory('books');
        }

        $booksData = [
            [
                'title' => "Harry Potter and the Sorcerer's Stone",
                'author' => 'J.K. Rowling',
                'isbn' => '9780590353427',
                'publisher' => 'Scholastic',
                'year' => 1997,
                'category' => 'Fiksi/Fantasi',
                'stock' => 12,
                'description' => 'Kisah seorang anak laki-laki penyihir yang menemukan dunia sihir yang menakjubkan.',
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'isbn' => '9780547928227',
                'publisher' => 'Houghton Mifflin Harcourt',
                'year' => 1937,
                'category' => 'Fiksi/Fantasi',
                'stock' => 8,
                'description' => 'Petualangan Bilbo Baggins untuk merebut kembali harta karun dari naga Smaug.',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'isbn' => '9780451524935',
                'publisher' => 'Signet Classic',
                'year' => 1949,
                'category' => 'Fiksi/Distopia',
                'stock' => 15,
                'description' => 'Novel distopia klasik tentang masyarakat di bawah pengawasan ketat pemerintah totaliter.',
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'isbn' => '9780060935467',
                'publisher' => 'Harper Perennial',
                'year' => 1960,
                'category' => 'Fiksi/Sastra',
                'stock' => 10,
                'description' => 'Kisah tentang ketidakadilan rasial dan hilangnya kepolosan di Amerika bagian Selatan.',
            ],
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'isbn' => '9780743273565',
                'publisher' => 'Scribner',
                'year' => 1925,
                'category' => 'Fiksi/Klasik',
                'stock' => 7,
                'description' => 'Potret era Jazz dan impian Amerika yang tragis.',
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'isbn' => '9780141439518',
                'publisher' => 'Penguin Classics',
                'year' => 1813,
                'category' => 'Fiksi/Romantis',
                'stock' => 9,
                'description' => 'Kisah cinta klasik antara Elizabeth Bennet dan Mr. Darcy.',
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'isbn' => '9780316769488',
                'publisher' => 'Little, Brown and Company',
                'year' => 1951,
                'category' => 'Fiksi/Sastra',
                'stock' => 5,
                'description' => 'Pemberontakan dan kebingungan seorang remaja, Holden Caulfield.',
            ],
            [
                'title' => 'The Alchemist',
                'author' => 'Paulo Coelho',
                'isbn' => '9780061122415',
                'publisher' => 'HarperOne',
                'year' => 1988,
                'category' => 'Fiksi/Filsafat',
                'stock' => 20,
                'description' => 'Perjalanan seorang gembala untuk menemukan harta karun dan takdirnya.',
            ],
            [
                'title' => 'The Hunger Games',
                'author' => 'Suzanne Collins',
                'isbn' => '9780439023481',
                'publisher' => 'Scholastic Press',
                'year' => 2008,
                'category' => 'Fiksi/Distopia',
                'stock' => 14,
                'description' => 'Pertarungan hidup dan mati dalam sebuah turnamen televisi yang kejam.',
            ],
            [
                'title' => 'Twilight',
                'author' => 'Stephenie Meyer',
                'isbn' => '9780316015844',
                'publisher' => 'Little, Brown and Company',
                'year' => 2005,
                'category' => 'Fiksi/Romantis',
                'stock' => 6,
                'description' => 'Kisah cinta antara seorang manusia biasa dan vampir.',
            ],
            [
                'title' => 'The Fault in Our Stars',
                'author' => 'John Green',
                'isbn' => '9780142424179',
                'publisher' => 'Penguin Books',
                'year' => 2012,
                'category' => 'Fiksi/Remaja',
                'stock' => 11,
                'description' => 'Kisah cinta dua remaja yang bertemu di kelompok pendukung kanker.',
            ],
            [
                'title' => 'Gone Girl',
                'author' => 'Gillian Flynn',
                'isbn' => '9780307588371',
                'publisher' => 'Crown Publishing Group',
                'year' => 2012,
                'category' => 'Fiksi/Misteri',
                'stock' => 8,
                'description' => 'Misteri hilangnya seorang istri dan kecurigaan yang mengarah pada suaminya.',
            ],
            [
                'title' => 'The Girl with the Dragon Tattoo',
                'author' => 'Stieg Larsson',
                'isbn' => '9780307949486',
                'publisher' => 'Vintage Crime/Black Lizard',
                'year' => 2005,
                'category' => 'Fiksi/Thriller',
                'stock' => 10,
                'description' => 'Seorang jurnalis dan hacker eksentrik menyelidiki kasus hilangnya seorang wanita berpuluh tahun lalu.',
            ],
            [
                'title' => 'A Game of Thrones',
                'author' => 'George R.R. Martin',
                'isbn' => '9780553103540',
                'publisher' => 'Bantam Spectra',
                'year' => 1996,
                'category' => 'Fiksi/Fantasi',
                'stock' => 18,
                'description' => 'Perebutan takhta dan kekuasaan di benua fiktif Westeros.',
            ],
            [
                'title' => 'The Kite Runner',
                'author' => 'Khaled Hosseini',
                'isbn' => '9781594631931',
                'publisher' => 'Riverhead Books',
                'year' => 2003,
                'category' => 'Fiksi/Sastra',
                'stock' => 13,
                'description' => 'Kisah persahabatan, pengkhianatan, dan penebusan berlatar belakang Afghanistan.',
            ]
        ];

        foreach ($booksData as $bookData) {
            $imageName = $bookData['isbn'] . '.jpg';
            $imagePath = 'books/' . $imageName;
            
            // Download real book cover from OpenLibrary using ISBN
            $imageUrl = "https://covers.openlibrary.org/b/isbn/" . $bookData['isbn'] . "-L.jpg";
            
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $imageUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                
                // Set timeout
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                
                $imageContents = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                
                // OpenLibrary sometimes returns a 1x1 pixel image if not found, usually ~43 bytes.
                // We check if it's a valid image and not too small.
                if ($httpCode == 200 && $imageContents && strlen($imageContents) > 1000) {
                    Storage::disk('public')->put($imagePath, $imageContents);
                    $bookData['image'] = $imagePath;
                } else {
                    $bookData['image'] = null; // Cover not found
                }
            } catch (\Exception $e) {
                $bookData['image'] = null;
            }

            Book::create($bookData);
        }
    }
}
