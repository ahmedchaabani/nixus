<?php
include '../Controller/coursC.php';
$coursC = new coursC();
$list = $coursC->listCours();
?>
<html>
    

<head></head>

<body>

    <center>
        <h1>List of offres</h1>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>reference</th>
            <th>nom_societe</th>
            <th>Description</th>
            <th>type_offre</th>
            <th>qr_code</th>
            <th>salaire</th>
            <th>mail</th>
           

            
        </tr>
        <?php
        foreach ($list as $cours) {
        ?>
            <tr>
                <td><?= $cours['reference']; ?></td>
                <td><?= $cours['nom_societe']; ?></td>
                <td><?= $cours['description']; ?></td>
                <td><?= $cours['type_offre']; ?></td>
                <td><?= $cours['qr_code']; ?></td>
                <td><?= $cours['salaire']; ?></td>
                <td><?= $cours['mail']; ?></td>
            
                
                

        
            </tr>
            <?php
        }
            ?>
            
        
    </table>
    
</body>

</html>