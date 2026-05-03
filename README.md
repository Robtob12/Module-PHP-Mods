# SIMPLE PHPTML

Mini librería PHP para desarrollo rápido con funciones para HTML, utilidades, seguridad, router y base de datos (PDO).

**Archivo principal:** `mod.php`  
**Versión actual:** `v1.3.1`  
**Autor:** Robtob12

---

# 🚀 Instalación

## Método 1 — Git Clone

```bash
git clone https://github.com/Robtob12/SIMPLE-PHPTML
```

```php
require_once("PHPTML/mod.php");
```

---

## Método 2 — Descargar ZIP

1. Descargar desde GitHub
2. Extraer
3. Incluir en tu proyecto:

```php
require_once("PHPTML/mod.php");
```

---

# ⚡ Inicio rápido

```php
<?php
require_once("PHPTML/mod.php");

INIT();
VERSION();

echo H1([], "Hola mundo");
echo BOLD("Texto en negrita");
```

---

# 📦 Funciones disponibles

---

## 🧠 Sistema

| Función | Descripción |
|---|---|
| `INIT()` | Verifica que el módulo está activo |
| `VERSION()` | Muestra información del módulo |

---

## ✍️ Texto

| Función | Descripción |
|---|---|
| `BOLD($text)` | Envuelve en `<strong>` |
| `ITAL($text)` | Envuelve en `<em>` |
| `UNDER($text)` | Envuelve en `<u>` |
| `FONT($text, $font)` | Aplica una fuente con `<span style>` |

---

## 🧱 HTML Helpers

Todas las funciones de etiquetas aceptan `$ind = []` como primer parámetro para agregar atributos (`class`, `id`, u otros).

```php
// Ejemplos de uso de $ind
echo H1(["c", "titulo"], "Hola");        // <h1 class='titulo'>Hola</h1>
echo DIV(["i", "main"], "Contenido");    // <div id='main'>Contenido</div>
echo P(["data-x", "5"], "Texto");        // <p data-x='5'>Texto</p>
```

### Encabezados
```php
H1($ind, $text)
H2($ind, $text)
H3($ind, $text)
H4($ind, $text)
H5($ind, $text)
H6($ind, $text)
```

### Contenedores
```php
DIV($ind, $content)
SPAN($ind, $content)
P($ind, $text)
MAIN($ind, $content)
SECTION($ind, $content)
ASIDE($ind, $content)
NAV($ind, $content)
HERO($ind, $content)       // Renderiza como <header>
FOOTER($ind, $content)
MARK($ind, $content)
CODE($ind, $content)
```

### Multimedia
```php
IMG($ind, $src, $alt)
VIDEO($ind, $src, $content)
AUDIO($ind, $src, $content)
SOURCE($ind, $src, $type)
```

### Enlace
```php
A($ind, $href, $text, $target)   // $target: "_blank" (default) o "_self"
```

### Separadores
```php
BR()
HR($ind)
```

### Favicon
```php
echo FAVICON("favicon.ico");   // En el <head>
```

---

## 📋 Listas

```php
$items = LI([], "Elemento uno") . LI([], "Elemento dos");
echo INLIST(["c", "mi-lista"], "ul", $items);
// <ul class='mi-lista'><li>Elemento uno</li><li>Elemento dos</li></ul>

// También soporta "ol"
echo INLIST([], "ol", $items);
```

---

## 🧾 Formularios

```php
echo FORM(["i", "mi-form"], "/enviar", "post");
echo INPUT(["c", "campo"], "text", "nombre", "Tu nombre", "");
echo BTN(["c", "btn-enviar"], "Enviar", "handleSubmit()");
echo "</form>";
```

```php
// Select
echo SELECT(["c", "pais"],
    OPTION([], "mx", "México") .
    OPTION([], "ar", "Argentina")
);
```

---

## 🧮 Tablas

```php
echo "<table>";
echo THEAD([],
    TR([],
        TH([], "Nombre") . TH([], "Edad")
    )
);
echo TBODY([],
    TR([],
        TD([], "Juan") . TD([], "25")
    )
);
echo "</table>";
```

---

## 🎨 CSS

```php
CSS("styles.css");   // Hace echo del <link> directamente
```

---

## 🔤 Lorem Ipsum

```php
echo LOREM(20);   // Genera 20 palabras aleatorias
```

---

## ⏰ Timer y Fecha

```php
TIMER("clase-reloj");   // Reloj en tiempo real con JS
echo TODAY();           // Fecha actual: "2025-06-01"
```

---

## 🔒 Seguridad

| Función | Descripción |
|---|---|
| `HTML($str)` | Escapa HTML con `htmlspecialchars` |
| `AUTH_EMAIL($email)` | Valida formato de email, retorna `bool` |
| `HASTD($password)` | Hash seguro con `PASSWORD_DEFAULT` |
| `HASTB($password)` | Hash seguro con `PASSWORD_BCRYPT` |

```php
echo HTML("<script>alert('xss')</script>");  // Seguro

if (AUTH_EMAIL("user@example.com")) {
    echo "Email válido";
}

$hash = HASTD("mipassword123");
```

---

## 🌐 Navegación / JS

| Función | Descripción |
|---|---|
| `GO($url)` | Redirección con `header()` |
| `ALERT($msg)` | Imprime `<script>alert(...)` |
| `CONSOLE($data)` | Imprime `<script>console.log(...)` |
| `RELOAD()` | Recarga la página |
| `RELOAD("btn")` | Retorna `"location.reload();"` para usar en `onclick` |
| `READ($msg)` | Lee entrada desde la terminal (CLI) |

```php
GO("/dashboard");

ALERT("Bienvenido");

echo BTN([], "Recargar", RELOAD("btn"));
```

---

## 📧 Email (PHPMailer)

```php
$smtp = [
    "host"   => "smtp.gmail.com",
    "user"   => "tu@gmail.com",
    "pass"   => "tu-app-password",
    "secure" => "tls",
    "port"   => 587,
    "name"   => "Mi App"
];

$result = SENDMAIL("destino@email.com", "Asunto aquí", "<h1>Hola!</h1>", $smtp);

if ($result === true) {
    echo "Correo enviado";
} else {
    echo $result;  // Mensaje de error
}
```

---

## 🔑 Código numérico

```php
echo CODE_NUM(6);   // Ej: "492817"
echo CODE_NUM(4);   // Ej: "3051"
```

> Útil para verificaciones de dos factores o tokens temporales.

---

## 🗄️ Base de datos (PDO)

### 🔌 Conexión

```php
$db = CPDO("localhost", "mi_base", "root", "password");

// Con confirmación visual:
$db = CPDO("localhost", "mi_base", "root", "password", true);
// → "Conectado a mi_base"
```

---

### 🔍 SELECT

```php
// Todos los registros
$rows = SQLS($db, "usuarios");

// Con columnas específicas
$rows = SQLS($db, "usuarios", "nombre, edad");

// Con WHERE
$rows = SQLS($db, "usuarios", "*", ["id" => 1]);
$rows = SQLS($db, "usuarios", "*", ["activo" => 1, "rol" => "admin"]);

foreach ($rows as $row) {
    echo $row["nombre"];
}
```

---

### ➕ INSERT

```php
$newId = SQLI($db, "usuarios", [
    "nombre" => "Juan",
    "email"  => "juan@mail.com",
    "edad"   => 25
]);

echo "Nuevo ID: $newId";
```

---

### ✏️ UPDATE

```php
$affected = SQLU($db, "usuarios",
    ["edad" => 30, "activo" => 1],  // datos a cambiar
    ["id" => 1]                     // condición WHERE
);

echo "Filas actualizadas: $affected";
```

---

### ❌ DELETE

```php
$affected = SQLD($db, "usuarios", ["id" => 1]);
```

> ⚠️ **Seguridad:** Lanza una excepción si se intenta ejecutar `DELETE` sin `WHERE`.

---

## 🌍 Router seguro

```php
ROUTER([
    "/"       => "home.php",
    "/about"  => "about.php",
    "/login"  => "login.php"
], "404.php");
```

**Características de seguridad:**
- Solo permite archivos dentro de `/public`
- Bloquea rutas relativas con `../`
- Compatible con query strings (`/user?id=5` funciona correctamente)
- Retorna `404` si la ruta no existe

---

## 🔢 Matemáticas

| Función | Descripción |
|---|---|
| `RANDOM($min, $max)` | Número aleatorio seguro (`random_int`) |
| `OF($percent, $number)` | Calcula porcentaje de un número |
| `EVEN($n)` | Retorna `true` si el número es par |
| `PRIME($n)` | Retorna `true` si el número es primo |
| `AREA($x, $y)` | Área de un rectángulo |
| `CRICLE($r)` | Área de un círculo |
| `RADIO($d)` | Radio a partir del diámetro |
| `DIAMETRO($r)` | Diámetro a partir del radio |

```php
echo OF(20, 500);       // 100
echo EVEN(8);           // true
echo PRIME(17);         // true
echo AREA(4, 5);        // 20
echo RADIO(10);         // 5
```

---

## 💰 Finanzas

| Función | Parámetros | Descripción |
|---|---|---|
| `INTSIMPLE($capital, $rate, $time)` | — | Interés simple |
| `AMOSIMPLE($capital, $rate, $time)` | — | Monto con interés simple |
| `INTCOMPOUND($capital, $rate, $time)` | — | Monto con interés compuesto |
| `PROFIT($income, $cost)` | — | Ganancia neta |
| `DISCOUNT($price, $percent)` | — | Precio con descuento |
| `TAX($price, $percent)` | — | Precio con impuesto |
| `SAVEMONEY($goal, $months)` | — | Ahorro mensual necesario |

```php
echo DISCOUNT(1000, 15);      // 850
echo TAX(1000, 16);           // 1160
echo PROFIT(5000, 3200);      // 1800
echo SAVEMONEY(12000, 12);    // 1000
echo INTCOMPOUND(1000, 0.05, 3);  // 1157.625
```

---

# 📁 Estructura del proyecto

```
Module-PHP-Mods/
├── Modules.mod.php
├── README.md
└── public/
    ├── home.php
    ├── about.php
    └── 404.php
```

> La carpeta `/public` es requerida si usas `ROUTER()`.

---

# ⚠️ Notas importantes

- Diseñado para proyectos rápidos — **no es un framework**
- No incluye MVC ni ORM completo
- Ideal para prototipos, herramientas internas y scripts
- `SENDMAIL` requiere instalar PHPMailer vía Composer

---

# 🛠 Próximas mejoras

- `SELECT` avanzado (`LIKE`, `>`, `<`, `ORDER BY`)
- `TEXTAREA()`
- `TABLE()` helper completo
- `MODAL()`
- `CSRF Token`
- Soporte completo de Composer
- Sistema de plantillas básico

---

# 📜 Licencia

MIT

---

# 👨‍💻 Autor

**Robtob12** — Mini librería PHP para acelerar desarrollo sin frameworks.  
🔗 [github.com/Robtob12/SIMPLE-PHPTML](https://github.com/Robtob12/SIMPLE-PHPTML)