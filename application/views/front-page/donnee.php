<!-- banner -->

      <!-- end banner -->
      <!-- food -->
        <div class="food">
            <div class="col-12 grid-margin stretch-card">
                <h6> Veuillez entrer vos informations </h6>
                <div>
                    <div class="form-group">
                        <p>
                            Type de régime: <select>
                                                <?php for ($i=0; $i < count($categorie) ; $i++) { ?>
                                                    <option value="<?php echo $categorie[$i]->get_id_categorie_regime();?>"> <?php echo $categorie[$i]->get_nom();?> </option>
                                                <?php }?>
                                            </select>
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            Poids initiale: <input type="number" name="poidsI">
                        </p>
                    </div>
                    <div class="form-group"> 
                        <p>
                            Poids desiré: <input type="number" name="poids">
                        </p>
                    </div>
                    
                    <button> Devis </button>
                </div>
            </div>
        </div>
     
      
      