<style>
    .table td button{
        color: black; 
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
            <div class="page-header">
                    <h3 class="page-title"> Liste Régimes </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Régimes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Catégorie</li>
                        </ol>
                    </nav>
            </div>
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pour la perte</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Poids</th>
                                                <th>Durée</th>
                                                <th>Montant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr> 
                                                <td> 5 </td>
                                                <td> 30 <td>
                                                <td>1000000</td>
                                                <td>     
                                                    <button> <i class="fas fa-eye"> </i> </button>
                                                    <button> <i class="fas fa-pencil-alt"> </i> </button>
                                                    <button> <i class="fas fa-trash-alt">  </i> </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <h4 class="card-title">Pour la prise</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Poids</th>
                                            <th>Durée</th>
                                            <th>Montant</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            <td> 5 </td>
                                            <td> 30 <td>
                                            <td>1000000</td>
                                            <td>     
                                                <button> <i class="fas fa-eye"> </i> </button>
                                                <button> <i class="fas fa-pencil-alt"> </i> </button>
                                                <button> <i class="fas fa-trash-alt">  </i> </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>          
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Créer un nouveau projet</h4>
                            <form class="forms-sample">
                                <div>   
                                    <label for="type"> Type de régime </label>
                                    <select class="form-control">
                                        <option> Perdre du poids </option>
                                        <option> Prendre du poids </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="duree">Durée:</label>
                                    <input type="number" class="form-control" id="duree" placeholder="duree">
                                </div>
                                <div class="form-group">
                                    <label for="poids">Poids:</label>
                                    <input type="number" class="form-control" id="poids" placeholder="poids">
                                </div>
                                <div class="form-group">
                                    <label for="montant">Montant:</label>
                                    <input type="number" class="form-control" id="montant" placeholder="montant">
                                </div>
                                <div class="form-group">
                                    <label for="aliments">Aliments:</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="aliments" name="aliments">
                                        <label for="aliments">Akoho</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="activites">Activités:</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="activites" name="activites">
                                        <label for="activites">Pompe</label>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                <button class="btn btn-dark">Retour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>