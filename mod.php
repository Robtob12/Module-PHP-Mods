<?php

/* =========================
   MODULES.MOD.PHP FIXED
   Mismos nombres, mejor uso
========================= */

/* =========================
   CONFIG
========================= */
require 'vendor/autoload.php';

/* =========================
   INFO
========================= */

function INIT(){
    echo "Servicio activo :)\n";
}

function VERSION(){
    echo "Remote: https://github.com/Robtob12/Module-PHP-Mods \n";
    echo "Author: Robtob12 - </Scripter> \n";
    echo "Version: Modules.mod.php v1.2.4t \n";
}

function ATTR($ind = []){
    if (!isset($ind[0])) return '';

    $key = $ind[0];
    $val = $ind[1] ?? '';

    if ($key === "c")  return " class='$val'";
    if ($key === "i")  return " id='$val'";

    return " $key='$val'";
}
/* =========================
   TEXTO
========================= */

function BOLD($arg = ''): string{
    return "<strong>$arg</strong>";
}

function ITAL($arg = ''): string{
    return "<em>$arg</em>"; // mejor que <i> (semántico)
}

function UNDER($arg = ''): string{
    return "<u>$arg</u>";
}

function FONT($text = "Function FONT", $font = "serif"): string{
    return "<span style='font-family:$font;'>$text</span>";
}

/* =========================
   TAGS HTML
========================= */

function A($ind = [], $arg = "#", $text = "Link-php-template", $target = "_blank"): string{
    $target = ($target === "_blank") ? "_blank" : "_self";
    return "<a href='$arg'".ATTR($ind)." target='$target'>$text</a>";
}

function INLIST($ind = [], $type = "ul", $items = ''): string{

    $type = strtolower($type);
    $type = ($type === "ol") ? "ol" : "ul";

    return "<$type".ATTR($ind).">$items</$type>";
}

function LI($ind = [], $content = ''){
    return "<li".ATTR($ind).">$content</li>";
}

function H1($ind = [], $text = ''): string{ return "<h1".ATTR($ind).">$text</h1>"; }
function H2($ind = [], $text = ''): string{ return "<h2".ATTR($ind).">$text</h2>"; }
function H3($ind = [], $text = ''): string{ return "<h3".ATTR($ind).">$text</h3>"; }
function H4($ind = [], $text = ''): string{ return "<h4".ATTR($ind).">$text</h4>"; }
function H5($ind = [], $text = ''): string{ return "<h5".ATTR($ind).">$text</h5>"; }
function H6($ind = [], $text = ''): string{ return "<h6".ATTR($ind).">$text</h6>"; }

function P($ind = [], $text = ''): string{
    return "<p".ATTR($ind).">$text</p>";
}

function SPAN($ind = [], $content = ''): string{
    return "<span".ATTR($ind).">$content</span>";
}

function FORM($ind = [], $action = '',$method ='get'): string{
    return "<form ".ATTR($ind)." action='$action' method='$method'>";
}

function INPUT($ind = [], $type = "text",$name = "", $plchldr = "",$value = ""): string{
    return "<input".ATTR($ind)." type='$type' name='$name' placeholder='$plchldr' value='$value'>";
}

function BTN($ind = [], $text = "Button", $onclick = ''): string{
    return "<button".ATTR($ind)." onclick='$onclick'>$text</button>";
}

function IMG($ind = [], $src = '', $alt = ''): string{
    return "<img src='$src'".ATTR($ind)." alt='$alt'>";
}

function DIV($ind = [], $content = ''): string{
    return "<div".ATTR($ind).">$content</div>";
}

function NAV($ind = [], $content = ''): string{
    return "<nav".ATTR($ind).">$content</nav>";
}

function HERO($ind = [], $content = ''): string{
    return "<header".ATTR($ind).">$content</header>";
}

function FOOTER($ind = [], $content = ''): string{
    return "<footer".ATTR($ind).">$content</footer>";
}

function MARK($ind = [], $content = ''): string{
    return "<mark".ATTR($ind).">$content</mark>";
}

function CODE($ind = [], $content = ''): string{
    return "<code".ATTR($ind).">$content</code>";
}

function MAIN($ind = [], $content = ''): string{
    return "<main".ATTR($ind).">$content</main>";
}

function ASIDE($ind = [], $content = ''): string{
    return "<aside".ATTR($ind).">$content</aside>";
}

function SECTION($ind = [], $content = ''): string{
    return "<section".ATTR($ind).">$content</section>";
}

function SELECT($ind = [], $content = ''){
    return "<select".ATTR($ind).">$content</select>";
}

function OPTION($ind = [], $value = '', $content = ''){
    return "<option".ATTR($ind)." value='$value'>$content</option>";
}

function THEAD($ind = [], $content = ''){
    return "<thead".ATTR($ind).">$content</thead>";
}

function TBODY($ind = [], $content = ''){
    return "<tbody".ATTR($ind).">$content</tbody>";
}

function TR($ind = [], $content = ''){
    return "<tr".ATTR($ind).">$content</tr>";
}

function TH($ind = [], $content = ''){
    return "<th".ATTR($ind).">$content</th>";
}

function TD($ind = [], $content = ''){
    return "<td".ATTR($ind).">$content</td>";
}

function VIDEO($ind = [], $src = '', $content = ''): string{
    return "<video src='$src'".ATTR($ind).">$content</video>";
}

function AUDIO($ind = [], $src = '', $content = ''): string{
    return "<audio src='$src'".ATTR($ind).">$content</audio>";
}

function SOURCE($ind = [], $src = '', $type = ''): string{
    return "<source src='$src' type='$type'".ATTR($ind).">";
}

function BR(): string{
    return '<br>';
}

function HR($ind = []): string{
    return "<hr".ATTR($ind).">";
}

function LOREM($target = 1): string{

    $words = [
        "lorem","ipsum","dolor","sit","amet",
        "consectetur","adipisicing","elit","tempor",
        "incididunt","labore","magna","aliqua",
        "enim","minim","veniam","quis","nostrud",
        "exercitation","ullamco","laboris","nisi",
        "aliquip","commodo","consequat","duis",
        "aute","irure","reprehenderit","voluptate",
        "velit","esse","cillum","eu","fugiat",
        "nulla","pariatur","excepteur","sint",
        "occaecat","cupidatat","non","proident"
    ];

    $target = max(1, (int)$target);

    $text = [];

    for($i = 0; $i < $target; $i++){
        $text[] = $words[array_rand($words)];
    }

    return ucfirst(implode(" ", $text)) . ".";
}

/* =========================
   CSS / FAVICON
========================= */

function CSS($arg = ''){
    echo "<link rel='stylesheet' href='$arg'>";
}

function FAVICON($arg = ''){
    return "<link rel='icon' href='$arg'>";
}

/* =========================
   CLOCK / FECHA
========================= */

function TIMER($class = ""){

    echo "
    <div class='$class'>
        <span id='clock_timer'></span>
    </div>

    <script>
        const clock = document.getElementById('clock_timer');

        function tick(){
            const now = new Date();

            clock.textContent = now.toLocaleTimeString();
        }

        tick();
        setInterval(tick, 1000);
    </script>
    ";
}

function TODAY(){
    return date("Y-m-d");
}

/* =========================
   SEGURIDAD
========================= */

function HTML($arg = ''): string{
    return htmlspecialchars($arg, ENT_QUOTES, 'UTF-8');
}

function AUTH_EMAIL(string $email): bool{

    $email = trim($email);

    if ($email === '') return false;

    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function HASTD($password = ''): string{
    return password_hash($password, PASSWORD_DEFAULT);
}

function HASTB($password = ''): string{
    return password_hash($password, PASSWORD_BCRYPT);
}

/* =========================
   RUTAS / JS
========================= */

function GO($url){
    header("Location: $url");
    exit;
}

function ALERT($msg){
    echo "<script>alert(" . json_encode($msg, JSON_UNESCAPED_UNICODE) . ");</script>";
}

function CONSOLE($arg){
    echo "<script>console.log(" . json_encode($arg, JSON_UNESCAPED_UNICODE) . ");</script>";
}

function READ($msg = ''){
    echo $msg;
    return trim(fgets(STDIN));
}

function RELOAD($arg = null){

    if ($arg === "btn") {
        return "location.reload();";
    }

    echo "<script>location.reload();</script>";
}

/* =========================
   MATH
========================= */

function RANDOM($min = 1, $max = 100){
    return random_int($min, $max);
}

function OF($percent, $number){
    return ($percent / 100) * $number;
}

function EVEN($n){
    return $n % 2 == 0;
}

function PRIME($n){

    if ($n < 2) return false;
    if ($n == 2) return true;
    if ($n % 2 == 0) return false;

    for($i = 3; $i <= sqrt($n); $i += 2){
        if($n % $i == 0) return false;
    }

    return true;
}

function AREA($x, $y){
    return $x * $y;
}

function CRICLE($r){
    return (3.14**2) * $r;
}

function RADIO($d){
    return $d / 2;
}

function DIAMETRO($r){
    return $r*2;
}

/* =========================
   FINANZAS
========================= */

function INTSIMPLE($capital, $rate, $time){
    return $capital * $rate * $time;
}

function AMOSIMPLE($capital, $rate, $time){
    return $capital * (1 + ($rate * $time));
}

function INTCOMPOUND($capital, $rate, $time){
    return $capital * pow(1 + $rate, $time);
}

function PROFIT($income, $cost){
    return $income - $cost;
}

function DISCOUNT($price, $percent){
    return $price - (($percent / 100) * $price);
}

function TAX($price, $percent){
    return $price + (($percent / 100) * $price);
}

function SAVEMONEY($goal, $months){
    return $goal / $months;
}

/* =========================
   ROUTER / EMAILS
========================= */

function ROUTER($routes = [], $notFound = null){

    $baseDir = realpath(__DIR__ . '/public');

    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $uri = rtrim($uri, '/') ?: '/';

    if (isset($routes[$uri])) {

        // construir ruta segura dentro de /public
        $file = realpath($baseDir . '/' . $routes[$uri]);

        if ($file && str_starts_with($file, $baseDir)) {
            require $file;
            return;
        }
    }

    http_response_code(404);

    if ($notFound) {
        $file = realpath($baseDir . '/' . $notFound);

        if ($file && str_starts_with($file, $baseDir)) {
            require $file;
            return;
        }
    }

    echo "404";
}

function SENDMAIL($to = '', $subject = '', $body = '', $smtp = []){

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {

        // 🔌 SMTP
        $mail->isSMTP();
        $mail->Host       = $smtp['host'] ?? 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp['user'] ?? '';
        $mail->Password   = $smtp['pass'] ?? '';
        $mail->SMTPSecure = $smtp['secure'] ?? 'tls';
        $mail->Port       = $smtp['port'] ?? 587;

        // 👤 Remitente
        $mail->setFrom($smtp['user'], $smtp['name'] ?? 'App');

        // 📩 Destino
        $mail->addAddress($to);

        // 📝 Contenido
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // 🚀 Enviar
        $mail->send();

        return true;

    } catch (\PHPMailer\PHPMailer\Exception $e) {
        return "Error: " . $mail->ErrorInfo;
    }
}

function CODE_NUM($length = 6){
    $code = "";

    for($i = 0; $i < $length; $i++){
        $code .= random(0, 9);
    }

    return $code;
}
/* =========================
   DATABASE
========================= */

function CPDO($host = '127.0.0.1',$dbname = '',$user = 'root',$pass = '',$show = false){

    try {

        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $user,
            $pass
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($show) {
            echo "Conectado a $dbname";
        }

        return $pdo;

    } catch(PDOException $e){
        return "Error de conexión: " . $e->getMessage();
    }
}

function SQLS($db, $table, $columns = '*', $where = []){

    $sql = "SELECT $columns FROM $table";
    $params = [];

    if (!empty($where)) {
        $conditions = [];

        foreach ($where as $key => $value) {
            $conditions[] = "$key = :$key";
            $params[":$key"] = $value;
        }

        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $query = $db->prepare($sql);
    $query->execute($params);

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function SQLI($db, $table, $data = []){

    $columns = implode(', ', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));

    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

    $query = $db->prepare($sql);
    $query->execute($data);

    return $db->lastInsertId();
}

function SQLU($db, $table, $data = [], $where = []){

    $set = [];
    $params = [];

    foreach ($data as $key => $value) {
        $set[] = "$key = :set_$key";
        $params[":set_$key"] = $value;
    }

    $sql = "UPDATE $table SET " . implode(', ', $set);

    if (!empty($where)) {
        $conditions = [];

        foreach ($where as $key => $value) {
            $conditions[] = "$key = :where_$key";
            $params[":where_$key"] = $value;
        }

        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $query = $db->prepare($sql);
    $query->execute($params);

    return $query->rowCount();
}

function SQLD($db, $table, $where = []){

    $sql = "DELETE FROM $table";
    $params = [];

    if (!empty($where)) {
        $conditions = [];

        foreach ($where as $key => $value) {
            $conditions[] = "$key = :$key";
            $params[":$key"] = $value;
        }

        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    else if (empty($where)) {
        throw new Exception("DELETE sin WHERE no permitido");
    }

    $query = $db->prepare($sql);
    $query->execute($params);

    return $query->rowCount();
}