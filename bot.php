<?php
set_time_limit(0);
//  ini_set('memory_limit', '3072M'); // or you could use 1G
require_once("simple_html_dom.php");

class getScriptClass
{

  public $kategori="Desserts - Bakery > turkish-delight"; //zorunlu alan buraya kategoriyi ver.
  public $urlNone = "turkish-delight"; //zorunlu alan oluşturulacak dosya adı xml
  public $webPageURL = "https://www.gourmeturca.com/turkish-delight?ps=9"; //zorunlu alan



    function createFolderXML($baslik,$aciklama,$marka,$fiyat,$indirimliFiyat,$resimler){

      $idStart = rand(0,9999).strtotime("h:i:s").rand(99,500).rand(0,500).rand(100,999);
      $model = rand(0,9999).rand(0,100).rand(99,500).rand(0,500).rand(1000,99999);

      $aciklama = strip_tags($aciklama);
      $aciklama = str_replace("&nbsp;"," ",$aciklama);
      $aciklama = str_replace("& nbsp;"," ",$aciklama);
      $aciklama = str_replace("&","-",$aciklama);

      $xmlUrunID = "<urun> <Urun_Id> $idStart </Urun_Id>";
      $xmlBaslik = "<Baslik> $baslik </Baslik>";
      $xmlModel = "<Model>  $model </Model>";
      $xmlKategori="<Kategori> $this->kategori </Kategori>";
      $xmlAciklama = "<Aciklama>$aciklama</Aciklama>";
      $xmlMarka = "<Marka>$marka</Marka>";
      $xmlFiyat = "<Fiyat>$fiyat</Fiyat>";
      $xmlIndirimliFiyat = "<IndirimliFiyat>$indirimliFiyat</IndirimliFiyat>";
      $xmlStok  = "<Stok>100000</Stok>";
      $xmlResimler = "<Resimler>$resimler</Resimler>  </urun> ";
      


      return $xmlUrunID.$xmlBaslik.$xmlModel.$xmlKategori.$xmlAciklama.$xmlMarka.$xmlFiyat.$xmlIndirimliFiyat.$xmlStok.$xmlResimler;


     
    }

    /* HTML dom */
    
    public $webDomain = "https://www.gourmeturca.com";

    function connectWebWage(){
      return file_get_html($this->webPageURL);
    }

    function getAllProductURL(){
      //sayfa içeriğindeki verileri çeker..
      $html = $this->connectWebWage();
      if(empty($html)) die("sayfa bulunamadı :(");

      // $pageData = array();
      $xmlStart = "<Urunler>";
      $xmlFinal = "</Urunler>";
      $xmlData = "";

      $urunler = array(); //tekrar ürünleri kapatır.

      foreach($html->find(".catalogWrapper .row  .detailLink") as $element){
       //tekrar ürünlerin önüne geçer.
        if(!in_array($element->href,$urunler))  $xmlData.=$this->getProductData($element->href)."\n";
        $urunler[] = $element->href;

       
      }

      
      $xml = $xmlStart.$xmlData.$xmlFinal;

      $myfile = fopen("$this->urlNone.xml", "a");
      fwrite($myfile, $xml);
      fclose($myfile);
      echo "Bu işlem tamam :) <br>";

   
        
    
    }

    function getProductData($url){
      //ürün içeriğine gider..
      $this->webPageURL = $this->webDomain.$url;
      $html = $this->connectWebWage();

      
      $urunAdiDiv = "#productName";
      $indirimsizFiyatDiv = ".discountedPrice";
      $indirimliFiyatDiv = ".product-price";
      $urunDetaylariDiv = "#productDetailTab";
      $imgDiv = "#pageContent #productImage .imgInner img";
      $markaDiv = "#productBrandText";

      $sure = 0;

      $sayac = 1;
      $xmlImg = "";
      foreach($html->find($imgDiv) as $image){
        $imageSrc = $image->src;
        $imageName = str_replace("https://www.gourmeturca.com/","",$imageSrc);

        if($sure == 5) sleep(1);

        $img = 'img/'. $imageName;
        file_put_contents($img, file_get_contents($imageSrc));

        $imgName = str_replace("https://www.gourmeturca.com","https://naturalturca.com/image/catalog/tumUrunler",$imageSrc);
        $xmlImg.="<Resim$sayac>$imgName</Resim$sayac>";
        $sayac++;

      }

     

      $urunAdi = $html->find($urunAdiDiv,0)->innertext;

      @$indirimsizFiyat =  $html->find($indirimsizFiyatDiv,0)->innertext;
      @$indirimsizFiyat =  str_replace("-","",filter_var($indirimsizFiyat, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION));

      
      $indirimliFiyat =  $html->find($indirimliFiyatDiv,0)->innertext;
      $indirimliFiyat =  str_replace("-","",filter_var($indirimliFiyat, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION));

      if(empty($indirimliFiyat)) $indirimliFiyat = "";

      if(empty($indirimsizFiyat)){
        //normal fiyat yoksa indirimli fiyatla yer değiştir ..
        $indirimsizFiyat = $indirimliFiyat;
        $indirimliFiyat = "";
      }

      $urunDetay  =  $html->find($urunDetaylariDiv,0)->innertext;
      


      $urunMarka = $html->find($markaDiv,0)->innertext;
      $urunMarka = str_replace("Gourmeturca","naturalturca",$urunMarka);
      $urunMarka = str_replace("gourmeturca","naturalturca",$urunMarka);
      $urunMarka = str_replace("gourme turca","naturalturca",$urunMarka);
      $urunMarka = str_replace("Gourme turca","naturalturca",$urunMarka);

      return $this->createFolderXML($urunAdi,$urunDetay,$urunMarka,$indirimsizFiyat,$indirimliFiyat,$xmlImg);



    }



}




$data = new getScriptClass;
print_r($data->getAllProductURL());


 ?>
