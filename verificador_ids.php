<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar IDs</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 300px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .output {
            margin-top: 20px;
            font-size: 18px;
        }
        .valid {
            color: green;
        }
        .invalid {
            color: red;
        }
        .used {
            color: orange;
        }
        .delete-history {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
        }
        .delete-history:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <button class="delete-history" onclick="borrarHistorial()">Borrar Historial</button>
    <h1>Verificador de IDs</h1>
    <p>Ingresa un ID y verifica si es válido, inválido o ya usado:</p>
    <input type="text" id="idInput" placeholder="Ingresa un ID">
    <button onclick="verificarID()">Verificar</button>
    <div class="output" id="output"></div>

    <script>
        // Lista de 500 IDs válidos
        const idsValidos = new Set([
    "Ks6&e", "!PtPB", "uUi&a", "eoHTr", "VuEbg", "ISm&c", "#bBGg", "chvRs", "4gsoB", "yusVM",
    "qtUhW", "LaCYM", "T9Y2x", "7mjMI", "!TSYL", "Wxr5y", "Wzt4f", "bA$Ls", "3YEQR", "CJnQo",
    "xuFOf", "SALWU", "h40a8", "cwCc8", "YG4#C", "Mgqfp", "i26i6", "JiKnX", "PcGgO", "Gibzd",
    "SG$5Y", "fGIDf", "oSWy?", "21Vou", "cJ¡jR", "F0ETL", "Qfhng", "#UjFt", "QMoZF", "8ERx3",
    "4jG2¡", "MYnHV", "b90/W", "OY933", "=B?&Q", "9%G¡V", "9J5Cz", "%BZaf", "$C!3r", "o9d3?",
    "wDhPS", "06dyI", "nbKvM", "¡YpxU", "JCndn", "I%PX2", "/02Hh", "GUmae", "G6gMo", "p3nP2",
    "FD6JN", "YiO8?", "jf=7J", "VTe¡C", "8k0uf", "BE!j6", "nHlbM", "K7sjD", "en#Q1", "p4xOm",
    "R%riU", "0b4mO", "OEvTJ", "O1Pg5", "/zyKg", "lkeU!", "Gpx3o", "dUMZ0", "AIoZ#", "OJFIe",
    "ELXA1", "nwPtT", "i¡C!3", "zHPKf", "bWRgS", "8I0GE", "i5$?v", "UBX#E", "BIa?=", "&w%RD",
    "D$49X", "2o$Pz", "&E3YG", "Y&gOA", "$yqj!", "e6wS7", "ltmy9", "5se?u", "sRY93", "w0La9",
    "YF6ey", "kFU5g", "XZYMT", "B43/U", "Kn8sh", "cFgvE", "G6AYR", "yWW%H", "I&F=g", "HEk1y",
    "FcT!m", "/#KkA", "!72¡P", "dZeti", "Ype4M", "#VOGZ", "6iB2E", "Pqk=I", "GOqOR", "QEjJk",
    "l¡&3y", "WSULA", "!7bRW", "j¡dXJ", "%KlFo", "5z##B", "FOSJp", "UYWBb", "1KQwP", "uVP2!",
    "VVvww", "vmO%9", "Zu!Kf", "EbqPS", "2YhuN", "f&SRH", "5pl$t", "7fv?1", "A5A7x", "hUuvB",
    "KW2tM", "YAZNw", "F7=7W", "wLe3H", "of$Xg", "h1vo6", "aCbP3", "/3AA4", "frGCi", "QDkK#",
    "/!4VX", "AgHL$", "KMAv6", "QeP0Y", "z!y0w", "d¡%rx", "vPH8f", "9Rm7c", "0Rk$Q", "n&qBD",
    "A4Wna", "d0DR1", "&Cmo0", "5Q4tn", "h6MeP", "B08uc", "bJ&dh", "owexu", "GL&HD", "kA6wZ",
    "5yCbT", "2##T?", "QBMsr", "rQSZ8", "pW5tV", "4nPoj", "Rg¡yW", "i4h/a", "I8$nk", "Kgou6",
    "2p/h5", "$/&¡=", "!Q9tr", "mhG1¡", "wj1j0", "/m3R!", "sB7As", "7Kxfi", "0785X", "H3x8t",
    "8&zM2", "gJI/F", "DwcLk", "X!kF&", "WZsW1", "37HHX", "3MQvW", "qSa2Z", "a/ZXG", "7sQ1%",
    "rB7zK", "7%dx6", "bFm=r", "w7TZ6", "qP$sX", "Itod9", "&Y$IV", "nbovn", "iLNB3", "GD0=k",
    "?rQYY", "ctQnK", "dAZyo", "CW1W7", "h8yx5", "jQvAJ", "Ws$=d", "IqfCM", "5R2!y", "rWF9P",
    "rQi2o", "FIcQq", "TGAyd", "Zx48U", "A5Rwf", "1Wrj5", "vN4q/", "eMdh6", "8mxGG", "4!f5o",
    "e?db5", "9kLbx", "DlRfs", "$QDkp", "NyIAc", "y0sAH", "db1pj", "!fZr6", "6pxB4", "2NcE2",
    "!#m8N", "q&suJ", "4fs9z", "NRlUd", "6E7aJ", "k#1CJ", "yhk1u", "=bs2%", "PBpps", "ax8zK",
    "EHy!=", "6rvrb", "ugQO1", "bDEv4", "%caOD", "4UZ7S", "07a10", "NSh#4", "T2v9F", "ijCag",
    "¡i&O?", "qE!fc", "200xm", "%uPk&", "qqgbV", "YkedQ", "a3nQk", "g!hP&", "U¡XyM", "Nd6Rn",
    "8PoQd", "iaYpP", "sqMTf", "jqHmD", "ww1Q=", "JnQ/P", "aejzL", "FE%Sw", "/3KQv", "o71Y?",
    "LskLP", "r2LpG", "vhY53", "kPOH9", "GI1Oi", "pafqu", "?wO%=", "!YQ?2", "50cPi", "wyJkU",
    "cDvOf", "OREpL", "3Gcun", "&39IJ", "GVDha", "6khy8", "r¡hS3", "BTfrT", "zemSL", "ZD9Qs",
    "OFqTq", "vVem5", "DuIjt", "b!&%r", "Eu9Q%", "EI8=u", "A2hSl", "uKTjI", "Pyiix", "w52SR",
    "9zZ0D", "oet0u", "ahqb6", "xf453", "e#ER¡", "ms1Zd", "Co%?b", "&3J/y", "eoVAJ", "p%LA¡",
    "tnYA6", "?PhmT", "X8QbD", "bEMj/", "oEh%!", "WNZPy", "%oBm4", "tMQ=L", "0uffR", "zP2eV",
    "k6N6m", "tZ6QA", "ke6l4", "cU%&f", "Uls0p", "lPsnd", "9RJSD", "jMri¡", "qQ=L3", "KT2q3",
    "sR8%G", "vuuYo", "pDNUX", "ZF%3o", "s$e$d", "ScxAs", "vA8GC", "NNbM/", "mb1¡8", "gsgIm",
    "zva¡p", "6y#&Z", "Fs894", "6uDS0", "9&W89", "cJ?=S", "zkXp9", "WnggS", "z%c8D", "¡=HQ3",
    "rWk&l", "cIu#S", "tbhC0", "GWSov", "2m=%R", "/ZtXj", "&4Z/M", "kv&Dy", "gUXXw", "=T939",
    "=Dy7B", "M/6CM", "q!0Iv", "Uz¡ZF", "jT3Ky", "yD4lj", "kgTIB", "Buzw0", "QWtND", "JnCGD",
    "S/ziO", "?vjV/", "U2pW6", "XFhwX", "g$fU0", "d02!4", "LoPcl", "BA9zl", "HD6Vk", "Cf3C0",
    "ixX53", "hv1Kz", "UK3o=", "$kuVl", "FaL99", "hcFaQ", "GcR&i", "J/Ih%", "1OUk0", "JJ74e",
    "ONyf=", "qD8Z/", "Sj4U?", "msNUW", "1x8uJ", "RyDGS", "6Q?I8", "#xfxs", "I#DWS", "ApmS4",
    "¡$=U?", "Ijs$I", "$dLnk", "9v&9¡", "aA8Lm", "0pBZk", "lWSTI", "zSpst", "G=0IG", "oqedk",
    "Pu&Q&", "phaVr", "U%!d¡", "HTVW¡", "ko/C/", "u2cfA", "#Ql9K", "7&1f4", "1F0JS", "4d$gt",
    "rgSIn", "OR#hj", "r9fDj", "P$4Jx", "$tFKQ", "GR3J$", "vL3oK", "cw$97", "ZL&4k", "Jdz0d",
    "twd54", "¡/FLs", "cmxNR", "y!kZo", "7byan", "vQghV", "EmD2S", "a0?$?", "Dwt3S", "Vxn%Z",
    "b$r?Y", "oGRve", "!S&sY", "#b9iY", "¡lDVa", "1wXsI", "==KTp", "ptJzV", "=MVoA", "P9ZMy",
    "PzzzG", "hESGd", "dzq84", "yz&c&", "F$0N/", "hsU9Y", "aYhBZ", "YbAeQ", "bSv9q", "rELB8",
    "Sx!qz", "Zhr/A", "fR1bM", "fnSW#", "w?3wR", "ddqw&", "FaMDH", "?2U¡y", "p?hTO", "PMkCx",
    "ejulW", "PjGGo", "3224C", "CkXKB", "RV$Yg", "ZM0eZ", "DFlIx", "qU%S2", "PdcWI", "yw2af",
    "P/=%V", "bPDn7", "BIVr4", "vyh/7", "0snUl", "d$5ox", "K!e1a", "T0¡xN", "DjT?5", "Ot7IO"

        ]);

        // Cargar IDs usados desde LocalStorage o iniciar como un conjunto vacío
        const idsUsados = new Set(JSON.parse(localStorage.getItem("idsUsados")) || []);

        function verificarID() {
            const idInput = document.getElementById("idInput").value.trim();
            const output = document.getElementById("output");

            if (!idInput) {
                output.innerHTML = "Por favor, ingresa un ID.";
                output.className = "output invalid";
                return;
            }

            if (idsValidos.has(idInput)) {
                if (idsUsados.has(idInput)) {
                    output.innerHTML = `INVALIDO: El ID "${idInput}" ya fue usado.`;
                    output.className = "output used";
                } else {
                    output.innerHTML = `VALIDO: El ID "${idInput}" es aceptado.`;
                    output.className = "output valid";
                    idsUsados.add(idInput); // Agregar el ID a los usados
                    localStorage.setItem("idsUsados", JSON.stringify(Array.from(idsUsados))); // Guardar en LocalStorage
                }
            } else {
                output.innerHTML = `NO VALIDO: El ID "${idInput}" no está en la lista.`;
                output.className = "output invalid";
            }
        }

        function borrarHistorial() {
            // Eliminar el historial de IDs usados
            idsUsados.clear();
            localStorage.removeItem("idsUsados");
            const output = document.getElementById("output");
            output.innerHTML = "Historial borrado. Puedes ingresar nuevos IDs.";
            output.className = "output";
        }
    </script>
</body>
</html>

