{% include 'layouts/navbar.volt' %}
<div class="container">
    <h3 class="mt-5 font-weight-bold font-italic">Nouveau Ticket par <span class="title-author">{{session.get('auth_id')['username']}}</span></h3>
    <hr />
    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="row m-3">
                    <div class="col-lg-5">
                        <input class="form-control" placeholder="Titre" name="title" />
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-lg-5">
                        <select id="select-services" class="custom-select">
                            <option disabled="disabled" selected>Selectionner un services</option>
                        </select>
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-lg-5">
                        <input class="form-control" placeholder="Selectionner un client" name="customer" />
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-lg-12">
                        <textarea class="form-control" placeholder="Détail du ticket" rows="12"></textarea>
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-block">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--
    <div class="ui-widget">
        <label for="tags">Tags: </label>
        <input id="tags">
      </div>
    -->
</div>