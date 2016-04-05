<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <title>Registro</title>

</head>

<body class="page-body  page-fade" data-url="http://neon.dev">

    <div class="page-container <?php if($text_align == 'right-to-left') echo 'right-sidebar';?>"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
       <form>
           <label>Nombre</label>
           <label>Apellidos</label>
           <label>Email</label>
           <label>Telefono</label>
           <label>Tipo de subscription
               <select>
                   <option>Prueb ($0.00 USD)</option>
                   <option>Limitada ($17.99 USD)</option>
                   <option>Regular ($29.99 USD)</option>
                   <option>Pro ($35.99 USD)</option>
               </select>
           </label>
       </form>
    </div>
</body>
</html>