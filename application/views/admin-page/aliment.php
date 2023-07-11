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
                        <li class="breadcrumb-item"><a href="#">Régime</a></li>
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
                                                <th>Nom</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr> 
                                                <td> Akoho </td>
                                                <td>
                                                    <button> <i class="fas fa-trash-alt">  </i> </button>
                                                    <button> <i class="fas fa-pencil-alt"> </i> </button> 
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
                                            <th>Nom</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr> 
                                        <td> Hen'omby </td>
                                            <td>
                                                <button> <i class="fas fa-trash-alt">  </i> </button>
                                                <button> <i class="fas fa-pencil-alt"> </i> </button> 
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
                            <h4 class="card-title">Ajouter un aliment</h4>
                            <form class="forms-sample">
                                <div class="form-group">   
                                    <label for="type"> Type de régime </label>
                                    <select class="form-control">
                                        <option> Perdre du poids </option>
                                        <option> Prendre du poids </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Nom</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom">
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