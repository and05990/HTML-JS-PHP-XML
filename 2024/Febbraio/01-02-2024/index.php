<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Creator</title>
</head>
<body>
    <form action="portafolio.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cognome" placeholder="Cognome">
        <input type="text" name="citta" placeholder="Città">
        <input type="text" name="descrizione" placeholder="Descrizione">
        <input type="text" name="link" placeholder="Link">
        <input type="file" name="fotoProfilo" accept="image">
        <button type="submit">Vedi Ora</button>
    </form>

    <script>
        function validateForm() {
            var fileInput = document.querySelector('input[name="fotoProfilo"]');
            var file = fileInput.files[0];

            if (file) {
                var fileType = file.type.split('/')[0];
                if (fileType !== 'image') {
                    alert('Please select a valid image file.');
                    return false;
                }
            }

            return true;
        }
    </script>
</body>
</html>