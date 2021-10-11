# php-web-botu

<b>Aslında bir sistemden veri çekmek için kullandığım ve bana sonuç olarak sistemdeki ürün bilgilerini (resimler dahil) veren bir bot. </b>
<b> <i> Kod satırında değişiklik yapmadan aynen paylaşacağım. </i> </b>
<p> Kullanımı çok basit :)  </p>

<p> Aşağıdaki arkadaşları kendinize göre düzenleyiniz. </p>

<ul>
<li> $urunAdiDiv = "#productName"; </li>
<li>$indirimsizFiyatDiv = ".discountedPrice";</li>
<li>$indirimliFiyatDiv = ".product-price";</li>
<li>$urunDetaylariDiv = "#productDetailTab";</li>
<li>$imgDiv = "#pageContent #productImage .imgInner img";</li>
<li>$markaDiv = "#productBrandText";</li>
</ul>


Sonrasında bunları düzenleyiniz. 
public $kategori="Desserts - Bakery > turkish-delight"; //zorunlu alan buraya kategoriyi ver.
public $urlNone = "turkish-delight"; //zorunlu alan oluşturulacak dosya adı xml
public $webPageURL = "https://www.gourmeturca.com/turkish-delight?ps=9"; //çekilecek sayfa verisi
public $aHrefYolu = '.catalogWrapper .row  .detailLink'; 
public $webDomain = "https://www.gourmeturca.com"; //ham url buraya yazılır.

$kategori bildiğiniz ürünün kategorisi. kendi sisteminize göre düzenleyebilirsiniz.
$urlNone XML çıktısının adı.
$webPageURL ise gidilecek sitenin URLsi..
$aHrefYolu ise tüm ürünlerin listelendiği ekrandaki urlyi tutan değişken.
$webDomain ise sistemin ham urlsi


