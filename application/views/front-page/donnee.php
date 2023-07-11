<!-- banner -->

      <!-- end banner -->
      <!-- food -->
        <div class="food">
            <div class="col-12 grid-margin stretch-card">
                <h6> Veuillez entrer vos informations </h6>
                <form action="<?=site_url("frontcontroller/suggestion");?>" method="post">
                    <div class="form-group">
                        <p>
                            Type de régime: <select name="idcategorieregime" class="form-select">
                                                <?php for ($i=0; $i < count($categorie) ; $i++) { ?>
                                                    <option value="<?php echo $categorie[$i]->get_id_categorie_regime();?>"> <?php echo $categorie[$i]->get_nom();?> </option>
                                                <?php }?>
                                            </select>
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            Poids initiale: <input type="number" class="form-control" name="poids">
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            Taille : <input type="number" class="form-control" name="taille">
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            Date de profil : <input type="date" class="form-control" name="dateprofil">
                        </p>
                    </div>
                    <div class="form-group"> 
                        <p>
                            Poids désiré: <input type="number" class="form-control" name="poidsobjectif">
                        </p>
                    </div>
                    
                    <button class="btn btn-primary"> Valider </button>
                </form>
            </div>
        </div>
     
      
      