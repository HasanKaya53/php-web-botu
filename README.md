# php-web-botu
Aslında bir sistemden veri çekmek için kullandığım ve bana sonuç olarak sistemdeki ürün bilgilerini (resimler dahil) veren bir bot.
Kod satırında değişiklik yapmadan aynen paylaşacağım.
Kullanımı çok basit :)

Aşağıdaki arkadaşları kendinize göre düzenleyiniz.

$urunAdiDiv = "#productName";
$indirimsizFiyatDiv = ".discountedPrice";
$indirimliFiyatDiv = ".product-price";
$urunDetaylariDiv = "#productDetailTab";
$imgDiv = "#pageContent #productImage .imgInner img";
$markaDiv = "#productBrandText";


Sonrasında bunları düzenleyiniz. 
public $kategori="Desserts - Bakery > turkish-delight"; //zorunlu alan buraya kategoriyi ver.
public $urlNone = "turkish-delight"; //zorunlu alan oluşturulacak dosya adı xml
public $webPageURL = "https://www.gourmeturca.com/turkish-delight?ps=9"; //zorunlu alan

$kategori bildiğiniz ürünün kategorisi. kendi sisteminize göre düzenleyebilirsiniz.
$urlNone XML çıktısının adı.
$webPageURL ise gidilecek sitenin URLsi..


