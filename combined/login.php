<?php
include_once 'header.php';
?>

  <?php
//ファイルの読み込み
require_once "db_connect.php";
require_once "functions.php";
//セッション開始

// セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

//POSTされてきたデータを格納する変数の定義と初期化
$datas = [
    'name'  => '',
    'password'  => '',
    'confirm_password'  => ''
];
$login_err = "";

//GET通信だった場合はセッション変数にトークンを追加
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    setToken();
}

//POST通信だった場合はログイン処理を開始
if($_SERVER["REQUEST_METHOD"] == "POST"){
    ////CSRF対策
    checkToken();

    // POSTされてきたデータを変数に格納
    foreach($datas as $key => $value) {
        if($value = filter_input(INPUT_POST, $key, FILTER_DEFAULT)) {
            $datas[$key] = $value;
        }
    }

    // バリデーション
    $errors = validation($datas,false);
    if(empty($errors)){
        //ユーザーネームから該当するユーザー情報を取得
        $sql = "SELECT id,name,password FROM users WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('name',$datas['name'],PDO::PARAM_INT);
        $stmt->execute();

        //ユーザー情報があれば変数に格納
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //パスワードがあっているか確認
            if (password_verify($datas['password'],$row['password'])) {
                //セッションIDをふりなおす
                session_regenerate_id(true);
                //セッション変数にログイン情報を格納
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] =  $row['name'];
                //ウェルカムページへリダイレクト
                header("location:index.php");
                exit();
            } else {
                $login_err = 'Invalid username or password.';
            }
        }else {
            $login_err = 'Invalid username or password.';
        }
    }
}
?>

<div class="center">
<h2>ログイン</h2>


        <p>ログインに必要な情報を入力してください。</p>

        <?php
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>
        <form action="<?php echo $_SERVER ['SCRIPT_NAME']; ?>" method="post">
            <div>
                <label>ユーザーネーム</label>
                <input type="text" name="name" class="form-control <?php echo (!empty(h($errors['name']))) ? 'is-invalid' : ''; ?>" value="<?php echo h($datas['name']); ?>">

                <span class="invalid-feedback"><?php echo h($errors['name']); ?></span>
            </div>

            <div>
                <label>パスワード</label>
                <input type="password" name="password" class="form-control <?php echo (!empty(h($errors['password']))) ? 'is-invalid' : ''; ?>" value="<?php echo h($datas['password']); ?>">

                <span class="invalid-feedback"><?php echo h($errors['password']); ?></span>
            </div>

            <div>
                <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>

            <p>アカウントがない方はこちらから <a href="signup.php">アカウント作成</a></p>
        </form>
</div>

<?php
include_once 'footer.php';
?>
