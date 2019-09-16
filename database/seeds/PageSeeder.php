<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages =['Hakkında','Kariyer','Vizyonumuz','Misyonumuz'];
        $count=0;
        foreach ($pages as $page){
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'slug'=>Str::slug($page),
                'image'=>'https://assets.entrepreneur.com/content/3x2/2000/20160602195129-businessman-writing-planning-working-strategy-office-focus-formal-workplace-message.jpeg',
                'content'=>'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. 
                            Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı 
                            oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden 
                            beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz 
                            yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden 
                            elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da 
                            içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus 
                            PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları 
                            ile popüler olmuştur.',
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
