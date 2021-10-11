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


<p> Sonrasında bunları düzenleyiniz.  </p>
<ul>
  <li> public $kategori="Desserts - Bakery > turkish-delight"; //zorunlu alan buraya kategoriyi ver. </li>
  <li> public $urlNone = "turkish-delight"; //zorunlu alan oluşturulacak dosya adı xml </li>
  <li> public $webPageURL = "https://www.gourmeturca.com/turkish-delight?ps=9"; //çekilecek sayfa verisi</li>
  <li> public $aHrefYolu = '.catalogWrapper .row  .detailLink'; </li>
  <li> public $webDomain = "https://www.gourmeturca.com"; //ham url buraya yazılır.</li>
</ul>


<p> <b>$kategori </b> bildiğiniz ürünün kategorisi. kendi sisteminize göre düzenleyebilirsiniz.
<b>$urlNone XML </b>çıktısının adı.
<b>$webPageURL</b> ise gidilecek sitenin URLsi..
<b>$aHrefYolu </b>ise tüm ürünlerin listelendiği ekrandaki urlyi tutan değişken.
<b>$webDomain</b> ise sistemin ham urlsi </p>


