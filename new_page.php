<div class="container mt-5 newpage">
    <div class="row-2">
        <div class="col-12 col-sm-6">
                <form action= "./index.php?content=new_page_create" method="post">
                    <label class="" for="inputTitel">Titel:</label>
                        <input class= "form-titel" type="text" name="titel" id="inputTitel" placeholder="Titel" required><br>

                        <label class="" for="inputArtikel">Artikel Text: </label><br>
                        <textarea class= "form-artikel" type="text-area" name="artikel" id="inputArtikel" required></textarea><br>

                        <label class="" for="inputAuteur">Uw Naam: </label>
                        <input class= "form-auteur" type="text" name="auteur" id="inputAuteur" placeholder="Auteur" required><br>

                        <input class="btn-art" type="submit" value="Verstuur" ><br>
                </form>            
            </div>
        </div>
    </div>