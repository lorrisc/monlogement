@extends('layouts.app')

<!-- css file -->
@section('style')
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<link href="{{ asset('css/accountManager.css') }}" rel="stylesheet">
<link href="{{ asset('css/passwordTest.css') }}" rel="stylesheet">
@endsection

<!-- title page -->
@section('title')
Mon compte
@endsection

<!-- content -->
@section('pagecontainerid')
id="accountManagerPage"
@endsection

@section('content')

<div id="account__topline">
    <a href="{{ route( 'dpaccountdashboard') }}" class="returnButton">
        <img src="{{asset('assets/icons/return.svg')}}" alt="icône bouton retour">
        <p>Retour</p>
    </a>

    <div class="account_title">
        <h2 class="semiBold">Gérer mon compte</h2>

        <?php
        $account_email_decrypt = decrypt(session('account_email'));
        $accountEmail = $account_email_decrypt['account_email'];
        echo '<p>' . $accountEmail . '</p>';
        ?>
    </div>
</div>
<section id="account__manager">
    <section id="account__manager__first" class="account__manager__part">
        <form action="{{ route( 'editaccountinformation') }}" method="post" id="account__manager__personnalinformation">
            {{ csrf_field() }}

            @if(Session::has('statusEditAccount'))
            <div class="successMessage">{{ Session::get('statusEditAccount') }}</div>
            @endif
            <div id="account__manager__email" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="email">E-mail</label>
                    <p class="additionalText">champ requis</p>
                </div>
                <input type="text" name="email" id="email" class="normalInput <?php if ($errors->first('email')) {
                                                                                    echo 'errorInput';
                                                                                }
                                                                                echo '"';
                                                                                if (old('email')) {
                                                                                    echo "value='";
                                                                                    echo old('email');
                                                                                    echo "'";
                                                                                } elseif ($account_email) {
                                                                                    echo "value='";
                                                                                    echo $account_email;
                                                                                    echo "'";
                                                                                } ?> required >
                <?php
                if ($errors->first('email')) {
                    echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('email') . "</p>";
                }
                ?>
            </div>

            <div id=" account__manager__firstname" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="firstname">Prénom</label>
                    <p class="additionalText">champ requis</p>
                </div>
                <input type="text" name="firstname" id="firstname" class="normalInput <?php if ($errors->first('firstname')) {
                                                                                            echo 'errorInput';
                                                                                        }
                                                                                        echo '"';
                                                                                        if (old('firstname')) {
                                                                                            echo "value='";
                                                                                            echo old('firstname');
                                                                                            echo "'";
                                                                                        } elseif ($account_firstname) {
                                                                                            echo "value='";
                                                                                            echo $account_firstname;
                                                                                            echo "'";
                                                                                        } ?> required >
                <?php
                if ($errors->first('firstname')) {
                    echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('firstname') . "</p>";
                }
                ?>
            </div>

            <div id=" account__manager__name" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="name">Nom</label>
                    <p class="additionalText">champ requis</p>
                </div>
                <input type="text" name="name" id="name" class="normalInput <?php if ($errors->first('name')) {
                                                                                echo 'errorInput';
                                                                            }
                                                                            echo '"';
                                                                            if (old('name')) {
                                                                                echo "value='";
                                                                                echo old('name');
                                                                                echo "'";
                                                                            } elseif ($account_surname) {
                                                                                echo "value='";
                                                                                echo $account_surname;
                                                                                echo "'";
                                                                            } ?> required >
                <?php
                if ($errors->first('name')) {
                    echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('name') . "</p>";
                }
                ?>
            </div>

            <div id=" account__manager__telephone" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="telephone">Téléphone</label>
                </div>
                <input type="tel" name="telephone" id="telephone" class="normalInput <?php if ($errors->first('telephone')) {
                                                                                            echo 'errorInput';
                                                                                        }
                                                                                        echo '"';
                                                                                        if (old('telephone')) {
                                                                                            echo "value='";
                                                                                            echo old('telephone');
                                                                                            echo "'";
                                                                                        } elseif ($account_phone) {
                                                                                            echo "value='";
                                                                                            echo $account_phone;
                                                                                            echo "'";
                                                                                        } ?> >
                <?php
                if ($errors->first('telephone')) {
                    echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('telephone') . "</p>";
                }
                ?>
            </div>

            <div class=" buttonContainer">
                <button type="reset" id="account__manager__personnalinformation__button_submit" class="button resetButton">Annuler</button>
                <button type="submit" id="account__manager__personnalinformation__button_reset" class="button submitButton">Valider</button>
            </div>
        </form>
    </section>

    <section id="account__manager__second" class="account__manager__part">
        <form action="{{ route( 'editpassword') }}" method="post" id="account__manager__password" class="passwordform">
            {{ csrf_field() }}
            @if(Session::has('statusEditPassword'))
            <div class="successMessage">{{ Session::get('statusEditPassword') }}</div>
            @endif
            <?php
            if ($errors->first('error')) {
                echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('error') . "</p>";
            }
            ?>

            <div id="account__manager__actualpassword" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="actualpassword">Mot de passe actuel</label>
                    <p class="additionalText">champ requis</p>
                </div>
                <input type="password" name="actualpassword" id="actualpassword" class="normalInput <?php if ($errors->first('actualpassword')) {
                                                                                                        echo 'errorInput';
                                                                                                    } ?>" value="{{old('actualpassword')}}" required>
                <?php
                if ($errors->first('actualpassword')) {
                    echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('actualpassword') . "</p>";
                }
                ?>
            </div>
            <div id="account__manager__password" class="inputContainer">
                <div class="inputContainer__topline">
                    <label for="password">Nouveau mot de passe</label>
                    <p class="additionalText">champ requis</p>
                </div>
                <input type="password" name="password" id="password" class="normalInput <?php if ($errors->first('password')) {
                                                                                            echo 'errorInput';
                                                                                        } ?>" required>
                <?php
                if ($errors->first('password')) {
                    echo "<p class='inputErrorMessage inputErrorMessageActive'>" . $errors->first('password') . "</p>";
                }
                ?>
            </div>

            <div id="account__manager__password__password_regex" class="password_regex_indication">
                <div id="minchar">
                    <i class="fa-solid fa-check"></i>
                    <p>8 caractères minimum</p>
                </div>
                <div id="chiffre">
                    <i class="fa-solid fa-check"></i>
                    <p>1 chiffre minimum</p>
                </div>
                <div id="lowercase">
                    <i class="fa-solid fa-check"></i>
                    <p>1 lettre minuscule minimum</p>
                </div>
                <div id="uppercase">
                    <i class="fa-solid fa-check"></i>
                    <p>1 lettre majuscule minimum</p>
                </div>
                <div id="maxchar">
                    <i class="fa-solid fa-check"></i>
                    <p>50 caractères maximum</p>
                </div>
            </div>

            <div class="buttonContainer">
                <button type="reset" id="account__manager__personnalinformation__button_submit" class="button resetButton">Annuler</button>
                <button type="button" id="account__manager__personnalinformation__button_reset" class="button submitButton submitpassword blockSubmit">Valider</button>
            </div>
        </form>

        <form action="{{ route( 'editcontactpreferences') }}" method="post" id="account__manager__contactpreferences">
            {{ csrf_field() }}

            <legend>Je souhaite lors d’une candidature partagé avec le propriétaire mon :</legend>

            <div class="checkboxcontainerobligatory">
                <div class="checkboxcontainer">
                    <input type="checkbox" id="emailpreferences" name="emailpreferences" disabled checked>
                    <label for="emailpreferences">e-mail</label>
                </div>
                <p class="additionalText">Obligatoire</p>
            </div>

            <div class="checkboxcontainerobligatory">
                <div class="checkboxcontainer">
                    <input type="checkbox" id="telephonepreferences" name="telephonepreferences" disabled checked>
                    <label for="telephonepreferences">numéro de téléphone</label>
                </div>
                <p class="additionalText">Obligatoire</p>
            </div>

        </form>
    </section>
</section>
@endsection

<!-- js file -->
@section('javascript')
<script src="{{asset('js/authentication/checkpasswordRestore.js')}}"></script>
<script src="{{asset('js/manageAccount.js')}}"></script>
@endsection