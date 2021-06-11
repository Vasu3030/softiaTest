<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Softia</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .divform {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
</style>

<body>

    <div class="divform">
        <form method="POST" action="{{ route('submitForm') }}">
        @csrf
            <label for="etudiant">Etudiant</label>
            <select id="etudiant" name="etudiant" class="etudiant">
            <option value="">Choisir un étudiant</option>
                @foreach ($etudiants as $etudiant)
                <option value={{ $etudiant->idEtudiant }}>{{ $etudiant->nom }}</option>
                @endforeach
            </select>

            <label for="convention">Convention:</label>
            <input type="text" id="convention" name="convention" value="" readonly></input>
            <input type="hidden" id="idConvention" name="idConvention" value="">

            <label for="story">Votre message:</label><br>
            <textarea id="message" name="message" rows="20" cols="100"></textarea>

            <input type="submit" value="Valider">
        </form>
    </div>
    <div>
        <h1>API REST pour récupérer les données</h1>
        <h2>Rajoutez la route en gras dans votre barre de recherche</h2>
        <h3>Etudiants</h3>
        <p>récupérer tous les étudiants : <strong>/etudiants</strong></p>
        <p>récupérer un étudiant avec son id : <strong>/etudiants/ID DE L'ETUDIANT</strong></p>

        <h3>Conventions</h3>
        <p>récupérer toutes les conventions : <strong>/conventions</strong></p>
        <p>récupérer une convention avec son id : <strong>/conventions/ID DE LA CONVENTION</strong></p>
        <p>récupérer tous les étudiants d'une convention: <strong>/conventions/ID DE LA CONVENTION/etudiants</strong></p>

        <h3>Attestations</h3>
        <p>récupérer toutes les attestations : <strong>/attestations</strong></p>
        <p>récupérer toutes les attestations d'un étudiant: <strong>/attestations/ID DE L'ETUDIANT</strong></p>
        
    </div>

    <script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.etudiant',function(){
            var id = $(this).val();
            var nomEtudiant = "";
            var prenomEtudiant = "";
            var nbHeur = "";
            var textArea = "";

			$.ajax({
				type:'get',
				url:'http://127.0.0.1:8000/getData',
				data:{'id':id},
				success:function(data){
                    nomEtudiant = data.nomEtudiant;
                    prenomEtudiant = data.prenom;
                    nbHeur = data.nbHeur.toString();                    
                    textArea = "Bonjour " + nomEtudiant + " " + prenomEtudiant + ", \n\n\nVous avez suivi " + nbHeur + "h de formation chez FormationPlus.\n\nPouvez-vous nous retourner ce mail avec la pièce jointe signée.\n\n\nCordialement,\n\nFormationPlus";
                document.getElementById('message').innerHTML = textArea;
                document.getElementById("convention").value = data.nom;
                document.getElementById("idConvention").value = data.idConvention;
				},
				error:function(){
                    console.log('fail');
				}
			});
		});
	});
    function test(){
        console.log(document.getElementById('message').value);
    }
</script>


</body>

</html>