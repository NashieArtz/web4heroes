<h1>User Dashboard <?=$userFirstName?></h1>

<a href="incident-create">
    Déclarer un incident
</a>

<form action="/user-dashboard" method="POST">
    <button type="submit">Un héro? Devenez en un</button>
</form>

<section class="col-md-12 d-flex">
    <div id="section-incident" class="col-md-10 col-sm-12">
        <ul>
            <li>Mes Incidents</li>
            <li>Incidents en cours</li>
        </ul>
    </div>
    <div id="section-info-user" class="col-md-2 col-sm-12">
        <a href="user-profile-edit">Éditer Profil</a>
        <ul>
            <li>photo profil</li>
            <li>Email</li>
            <li>Firstname</li>
            <li>Lastname</li>
            <li>Gender</li>
            <li>Birthdate</li>
            <li>Phone</li>
            <li>Adresse
                <ul>
                    <li>number</li>
                    <li>complement</li>
                    <li>street</li>
                    <li>postal code</li>
                    <li>city</li>
                    <li>country</li>
                </ul>
            </li>
            <li>Newsletter
                <ul>
                    <li>Activer/Désactiver</li>
                </ul>
            </li>
        </ul>
    </div>
</section>

