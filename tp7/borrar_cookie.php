<?php
setcookie('tipo_noticia', '', time() - 3600);
header('Location: periodico.php');
