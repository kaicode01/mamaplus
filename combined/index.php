<?php
include_once 'header.php';
?>



<section id=" dekiru" class="">
  <?php
  if (isset($_SESSION["useruid"])) {
    echo "<p>Hello there" . $_SESSION["useruid"] . "</p>";
    echo "<li><a href='sign.php'>Sign Up</a></li>";
    echo "<li><a href='login.php'>Log in</a></li>";
  }
  ?>
  <div class="container center ">

    <div style="padding:20px;">
      <h1>ママぷらすの３つのポイント</h1>
    </div>

    <div class="col-3 ">
      <div class="frame_pink_s center">
        <img src="./img/chat-bubble.png" style="width:50%;height:auto">
        <h2>気軽</h2>
        <p>時間や場所を問わず、LINEでサポート。</p>
      </div>

      <div class="frame_pink_s center">
        <img src="./img/support.png" style="width:50%;height:auto">
        <h2>個別</h2>
        <p>チャット診断をもとに<br><a href="info.html">保健師</a>が個別診断。</p>
      </div>

      <div class="frame_pink_s ">
        <img src="./img/journaling.png" style="width:50%;height:auto">
        <h2>値段</h2>
        <p>他社のサービスと<br>比較してもお得！</p>
      </div>
    </div>

  </div>
</section>





<section id="service" class="">
  <div class="container ">

    <div class="center">
      <h1>サービス紹介</h1>
    </div>




    <div class="col-1 ">
      <div class="frame_pink_s ">
        <img src="./img/baby.png" style="width:10%;height:auto">
        <h2 class="">LINE<br>チャット相談</h2>

        <a href="https://lin.ee/xSNcQu9" class="btn btn-white pink ">300<span class="sm ">円 / 月</span></a>
        <p style="text-align:center;">気になることをいつでも何度でもLINEでご相談いただけます。<br>今すぐ登録するならライン登録ボタンをクリック！</p>
        <div class="mt15 "><a href="./service.html" class="white fs20 dashed ">more</a><br>▼</div>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>


<section id="adds" class="">
  <div class="container ">
    <div class="frame_pink ">
      <div class="col-2 ">
        <div><img src="./img/Tomoya.png"></div>
        <div class="about_adds ">
          <h1>わたしたちについて</h1>
          <h2>NPO法人FLOW<img src="./img/flow.png" class="logo_adds"></h2>
          <p>心の底から湧き上がる本当にやりたいことが自覚できるようサポートいたします。</p>
          <p class=""><a href="https://flow-pro.jp/" target="_blank" class="fright white " rel="noopener">flow-pro.jp▶︎</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include_once 'footer.php';
?>