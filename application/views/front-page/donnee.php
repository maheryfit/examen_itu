<!-- banner -->

      <!-- end banner -->
      <!-- food -->
        <div class="food">
            <div class="container">
                <h6> Veuillez entrer vos informations </h6>
                <div>
                    <p>
                        Type de régime: <select>
                                            <?php for ($i=0; $i < count($categorie) ; $i++) { ?>
                                                <option value="<?php echo $categorie[$i]->get_id_categorie_regime();?>"> <?php echo $categorie[$i]->get_nom();?> </option>
                                            <?php }?>
                                        </select>
                    </p>
                    <p>
                        Poids initiale: <input type="number" name="poidsI">
                    </p>
                    <p>
                        Poids desiré: <input type="number" name="poids">
                    </p>
                    <button> Devis </button>
                </div>
            </div>
        </div>
     
      
      