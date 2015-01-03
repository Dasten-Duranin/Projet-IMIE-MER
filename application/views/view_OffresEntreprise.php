<section>
    <table>
        <thead>
            <th>
                <td>
                    Numéro de l'offre
                </td>
                <td>
                    Titre de l'offre
                </td>
                <td>
                    Stage
                </td>
                <td>
                    Alternance
                </td>
                <td>
                    Emploi
                </td>
                <td>
                    Modifier
                </td>
            </th>
        </thead>
        <tbody>
            <td> <?php $i=1; foreach ($Offres as $Offre) { echo '
                <td>
                    '.$i.'
                </td>
                <td>
                    '.$Offre->TitreOffre.'
                </td>
                <td>';
                    if ($Offre->StageOffre == 1) {echo '<img src="'.base_url().'\Public\img\Interface\Tick.png" alt="Modifier l\'offre" title="Modifier l\'offre" />';} echo '
                </td>
                <td>';
                    if ($Offre->AlternanceOffre == 1) {echo '<img src="'.base_url().'\Public\img\Interface\Tick.png" alt="Modifier l\'offre" title="Modifier l\'offre" />';} echo '
                </td>
                <td>';
                    if ($Offre->EmploiOffre == 1) {echo '<img src="'.base_url().'\Public\img\Interface\Tick.png" alt="Modifier l\'offre" title="Modifier l\'offre" />';}  echo '
                </td>
                <td>
                    <img src="'.base_url().'\Public\img\Interface\Modif.png" alt="Modifier l\'offre" title="Modifier l\'offre" />
                </td>
            </td> ';}?>
        </tbody>
    </table>
</section>
