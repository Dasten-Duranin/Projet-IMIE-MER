<section class="clear">
    <article class="eleves clear">
        <?php $i=0;
            foreach ($eleves as $eleve) { $i+=1; echo '
                <div class="eleve" id="eleve'.$i.'">
                    <img src="'; if($eleve->PhotoProfil != FALSE) {echo $eleve->PhotoProfil;} else {echo base_url().'Public/img/Defaut_Photo_Profile.png';} echo '" width="210" height="270" />
                    <div class="accroche">
                        '.$eleve->Accroche.'
                    </div>
                </div>
            ';}
        ?>
    </article>
</section>
