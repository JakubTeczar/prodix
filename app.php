<?php
    session_start();
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		
    }else{
        header('Location: index.php');
		exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sass/pages/sportApp.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <!-- Json -->
    <script src="./js/sendJson.js" defer></script>
    <script src="./js/getJson.js" defer></script>

    <script src="./js/stopWatch.js" defer></script>
    <script src="./js/script.js" defer></script>
    <script src="./js/creatingPanel.js" defer></script>
    <script src="./js/drag&drop.js" defer></script>
    <script src="./js/planFunctions.js" defer></script>
    <script src="./js/calendar.js" defer></script>
    <script src="./js/data.js" defer></script>
    <script src="./js/chart.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,700;1,300&family=Roboto:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Aplikacja</title>
</head>
<body>
<div class="loading">
    <h4>Wysyłanie...</h4>
</div>
<div class="flyout-menu">
    <!-- <a href="#"><div class="flyout-menu__element" data-text="HOME"> Home</div></a> -->
    <a href="#"><div class="flyout-menu__element"  data-text="STREFA&nbsp;SPORTU">Strefa Sportu</div></a>
    <a href="logout.php"><div class="flyout-menu__element" data-text="WYLOGUJ">wyloguj</div></a>
</div>

<nav class="nav">
    <div class="nav__company-details">
        <div class="nav__company-details--name">PRODIX</div>
        <div class="nav__company-details--zone">STREFA SPORT</div>
    </div>

    <div class="nav__menu">
        <div class="nav__menu--line"></div>
        <div class="nav__menu--line"></div>
        <div class="nav__menu--line"></div>
    </div>
</nav>

<section class="first-page container">
    

    <main class="first-page__main">
        <div class="main__calendar-container">
            <div class="calendar-switch-month">
                <div class="calendar-switch-month__arrow"></div>
                <div class="calendar-switch-month__name">Czerwiec 2022</div>
                <div class="calendar-switch-month__arrow"></div>
            </div>
            <div class="calendar">
            </div>
        </div>

        <div class="main__information">
            <div class="information__title">ostatnie aktywność</div>
            <div class="information__card-container">
            </div>
        </div>

        <button class="main__start-training-btn">
            <div class="btn-left-corner"></div>
            <div class="btn-right-corner"></div>
            Zacznij trening
        </button>
    </main>
 
</section>
<section class="data container">
    <div class="data__input">
        <div class="data__input__btn-container">
            <button class="data__input__btn-container--body chosen">Pomiary ciała</button>
            <button class="data__input__btn-container--weight ">Wyniki siłowe</button>
        </div>
        <div class="measurement__container">
            <div class="measurement__input-box">
                <div class="measurement__input-box--text">Klatka piersiowa</div>
                <input class="measurement__input-box--input" value="0cm" type="text">
            </div>
            <div class="measurement__input-box">
                <div class="measurement__input-box--text">Biceps</div>
                <input class="measurement__input-box--input"value="0cm" type="text">
            </div>
            <div class="measurement__input-box">
                <div class="measurement__input-box--text">Przedramię</div>
                <input class="measurement__input-box--input" value="0cm" type="text">
            </div>
            <div class="measurement__input-box">
                <div class="measurement__input-box--text">Nadgarstek</div>
                <input class="measurement__input-box--input" value="0cm" type="text">
            </div>
            <div class="measurement__input-box">
                <div class="measurement__input-box--text">Kark</div>
                <input class="measurement__input-box--input" value="0cm" type="text">
            </div>
            <div class="measurement__input-box">
                <div class="measurement__input-box--text">Talia</div>
                <input class="measurement__input-box--input" value="0cm" type="text">
            </div>
            <div class="measurement__input-box">
                <div class="measurement__input-box--text">Biodra</div>
                <input class="measurement__input-box--input" value="0cm" type="text">
            </div>
            <div class="measurement__input-box">
                <div class="measurement__input-box--text">Uda</div>
                <input class="measurement__input-box--input" value="0cm" type="text">
            </div>
            <div class="measurement__input-box">
                <div class="measurement__input-box--text">Łydka</div>
                <input class="measurement__input-box--input" value="0cm" type="text">
            </div>
        </div>
        <button class="data__save-btn clean-btn">Zapisz zmiany</button>
    </div>
    <div class="data__output">
        <canvas id="myChart"></canvas>
    </div>

</section>
<section class="my-plans container">
    <div class="my-plans__top">
        <div class="my-plans__title">Twoje plany treningowe</div>
        <!-- <div class="my-plans__btn-container">
            <div class="btn-container__text">Publicznie plany</div>
            <input type="checkbox" class="btn-container__input" name="" id="">
        </div> -->
    </div>
    <div class="my-plans__bottom">
        <div class="my-plans__card-container">
        </div>
        <div class="my-plans__crate-plan-btn clean-btn">Stworz Nowy trening</div>
    </div>
</section>
<footer>
    <div class="company-name">
        @ PRODIX 2022
    </div>
</footer>

<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<section class="creating-panel">
    <div class="creating-panel__mobile">
        <div class="title">Zbyt mały ekran do tworzenia planu</div>
    </div>
    <!-- <div class="creating-panel__name">Tworzenie Planu treningowego</div> -->
    <div type="text" class="creating-panel__title">
        <input type="text"  data-text="tytul">
        <div type="text" class="placeholder">nazwa planu</div>
    </div>
 
    <div class="creating-panel__switch-type">
        <button class="creating-panel__switch-type--exercise selected">Ćwiczenia</button>
        <button class="creating-panel__switch-type--set">Serie</button>
    </div>
    <div class="creating-panel__select-container select-container">
        <!-- <div class="select-container__element">
            <div class="select-container__element--name">Podciąganie nachwytem</div>
        </div> -->
    </div>
    <button class="creating-panel__add-btn">Dodaj cwiczenie</button>

    <div type="text" class="creating-panel__description">
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <!-- <input type="text"  data-text="tytul"> -->
        <div type="text" class="placeholder">opis planu</div>
    </div>

    <div class="creating-panel__info">
        <div class="creating-panel__info--text">Plan treningu</div>
        <!-- <button class="creating-panel__info--delete-btn" draggable="true">usuń</button> -->
    </div>

    <div class="creating-panel__plan plan">
        <div class="plan--line"></div>
        <div class="plan--line"></div>
        <div class="plan--line"></div>
        <div class="plan__text">Nazwa ćwiczenia</div>
        <div class="plan__text">Powtorzenia</div>
        <div class="plan__text">Ciężar</div>
        <div class="plan__container">

        </div>
    </div>
    <div class="creating-panel__action-container">
        <!-- tu jest ukryty guzik publiczny -->
        <div class="creating-panel__public-plan" style="opacity:0">
            <div class="creating-panel__public-plan--text">Publiczny plan</div>
            <input type="checkbox" class="creating-panel__public-plan--checkbox">
        </div>
        <button class="creating-panel__save-plan-btn">Zapisz Plan</button>
    </div>
    
</section>
<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<section class="exercise-add-panel">

    <div class="exercise-add-panel__container">
        <div type="text" class="exercise-add-panel__title">
            <input type="text" >
            <div type="text" class="placeholder">Nazwa Ćwiczenia</div>
        </div>
        <div type="text" class="exercise-add-panel__description">
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <div type="text" class="placeholder">Opis ćwiczenia</div>
        </div>
        <div class="exercise-add-panel__details">
            <div type="text" class="exercise-add-panel__repetitions">
                <input type="number" >
                <div type="text" class="placeholder">pówtorzenia</div>
            </div>
            <div type="text" class="exercise-add-panel__weight">
                <input type="number" >
                <div type="text" class="placeholder">ciężar (kg)</div>
            </div>
        </div>
        <button class="exercise-add-panel__add-btn">Dodaj ćwiczenie</button>

    </div>
   
</section>
<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<section class="exercise-edit-panel">
    <div class="exercise-edit-panel__container">
        <div type="text" class="exercise-edit-panel__title">
            <input type="text" >
            <div type="text" class="placeholder">Nazwa Ćwiczenia</div>
        </div>
        <div type="text" class="exercise-edit-panel__description">
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <div type="text" class="placeholder">Opis ćwiczenia</div>
        </div>
        <div class="exercise-add-panel__details">
            <div type="text" class="exercise-edit-panel__repetitions">
                <input type="number" >
                <div type="text" class="placeholder">pówtorzenia</div>
            </div>
            <div type="text" class="exercise-edit-panel__weight">
                <input type="number" >
                <div type="text" class="placeholder">ciężar (kg)</div>
            </div>
        </div>
        <button class="exercise-edit-panel__delete-btn">usuń ćwiczenie</button>
        <button class="exercise-edit-panel__save-btn">Zapisz ćwiczenie</button>

    </div>
</section>
<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<section class="set-edit-panel">
    <div class="set-edit-panel__container">
        <div class="set-edit-panel__title-container">
            <div type="text" class="set-edit-panel__title">
                <input type="text" >
                <div type="text" class="placeholder">Nazwa Serji</div>
            </div>
        </div>
        
        <div class="set-edit-panel__text">Ćwiczenia</div>
        <div class="set-edit-panel__select-container select-container">
        </div>
    
        <div class="set-edit-panel__plan plan">
            <div class="plan--line"></div>
            <div class="plan--line"></div>
            <div class="plan--line"></div>
            <div class="plan__text">Nazwa ćwiczenia</div>
            <div class="plan__text">Powtorzenia</div>
            <div class="plan__text">Ciężar</div>
            <div class="plan__container">
            
            </div>
        </div>
        <div class="set-edit-panel__action-container">
            <button class="set-edit-panel__delete-btn">Usuń Serje</button>
            <button class="set-edit-panel__save-btn">Zapisz Serje</button>
        </div>
    </div>
    
</section>
<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<section class="select-plan">

        <div class="select-plan__title">Wybierz plan treningowy</div>
        <div class="select-plan__card-container">
            <div class="card">
                <div class="card__description">
                    <div class="card__description--title">Plan FBW</div>
                    <div class="card__description--text">Trening całego ciała dedykowana dla kalistenicznych swirow tak tak</div>
                </div> 
                <div class="card__action">
                    <button class="card__action--show-details">zobacz szczegóły</button>
                    <button class="card__action--select-plan">Wybierz plan</button>
                </div>
            </div>
            <div class="card">
                <div class="card__description">
                    <div class="card__description--title">Plan FBW</div>
                    <div class="card__description--text">Trening całego ciała dedykowana dla kalistenicznych swirow tak tak</div>
                </div> 
                <div class="card__action">
                    <button class="card__action--show-details">zobacz szczegóły</button>
                    <button class="card__action--select-plan">Wybierz plan</button>
                </div>
            </div>

            <div class="card">
                <div class="card__description">
                    <div class="card__description--title">Plan FBW</div>
                    <div class="card__description--text">Trening całego ciała dedykowana dla kalistenicznych swirow tak tak</div>
                </div> 
                <div class="card__action">
                    <button class="card__action--show-details">zobacz szczegóły</button>
                    <button class="card__action--select-plan">Wybierz plan</button>
                </div>
            </div>

            <div class="card">
                <div class="card__description">
                    <div class="card__description--title">Plan FBW</div>
                    <div class="card__description--text">Trening całego ciała dedykowana dla kalistenicznych swirow tak tak</div>
                </div> 
                <div class="card__action">
                    <button class="card__action--show-details">zobacz szczegóły</button>
                    <button class="card__action--select-plan">Wybierz plan</button>
                </div>
            </div>
        </div>
    <button class="select-plan__crate-plan-btn">Stwórz nowy trening</button>
</section>
<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<section class="show-plan">

    <div class="show-plan__container">
        <div class="show-plan__title"></div>
        <div class="show-plan__description"></div>

        <div class="show-plan__element-container plan">
            <div class="plan--line"></div>
            <div class="plan--line"></div>
            <div class="plan--line"></div>
            <div class="plan__text">Nazwa ćwiczenia</div>
            <div class="plan__text">Powtorzenia</div>
            <div class="plan__text">Ciężar</div>
            <div class="plan__container">

            </div>
        </div>
        <div class="btn-container">
            <!-- <button class="show-plan__add-btn">edytuj swoj plan edytuj swoj plan</button>-->
            <button class="show-plan__close-btn">Zamknij podgląd</button>
        </div>
    </div>

</section>
<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<section class="show-set">
    <div class="show-set__container">
        <div class="show-set__title">Nogi</div>
        <div class="show-set__element-container plan">
            <div class="plan--line"></div>
            <div class="plan--line"></div>
            <div class="plan--line"></div>
            <div class="plan__text">Nazwa ćwiczenia</div>
            <div class="plan__text">Powtorzenia</div>
            <div class="plan__text">Ciężar</div>
            <div class="plan__container">
                
            </div>
        </div>
        <div class="btn-container">
            <button class="show-set__close-btn">Zamknij podgląd</button>
        </div>
    </div>
</section>
<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<section class="show-day">

    <div class="show-day__container">
        <div class="show-day__top-panel">
            <div class="show-day__text">Czy byłeś na treningu</div>
            <div class="show-day__date">20.06.2022</div>
        </div>
        <div class="show-day__action-panel">
            <button class="show-day__yes-btn chosen">Tak</button>
            <button class="show-day__no-btn">Nie</button>
        </div>
    </div>
   
</section>
<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<section class="display-plan">
    <div class="display-plan__container">
        <div class="display-plan__progress-bar">
            <div class="display-plan__progress-bar--title"></div>
            <div class="display-plan__progress-bar--box">
                <div class="display-plan__progress-bar--fill"></div>
            </div>
            
        </div>
        <div class="display-plan__show-exercise">
            <div class="display-plan__show-exercise--title"></div>
            <div class="display-plan__show-exercise--details">
                <div class="repetitions">
                    <div class="value"></div>
                    <div class="sub-title">powtorzenia</div>
                </div>
                <div class="line"></div>
                <div class="weight">
                    <div class="value"></div>
                    <div class="sub-title">ciężar</div>
                </div>

            </div>
            <div class="display-plan__show-exercise--description">
              
            </div>
        </div>
        <div class="display-plan__action-panel">
            <button class="display-plan__previous-btn">Wstecz</button>
            <button class="display-plan__next-btn">Następne</button>            
            <div class="display-plan__next-exercise"></div>      
        </div>
    </div>
</section>
<div class="exit">
    <div class="cross">
        <div class="cross__line"></div>
        <div class="cross__line"></div>
    </div>
    <div class="exit__title">Zamknij</div>
    <br>
</div>
<section class="confirm-choose">

    <div class="confirm-choose__question">Zapisać zmiany ?</div>
    <div class="confirm-choose__btn">
        <button class="confirm-choose__btn--no">NIE</button>
        <button class="confirm-choose__btn--yes">TAK</button>
    </div>
</section>
<section class="error">
    <div class="error__message">Dodaj nazwe ćwiczenia</div>
</section>
<!-- ///////////////////////////////////////////////////////-------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<template class="card-temp">
    <div class="card">
        <div class="card__description">
            <div class="card__description--title"></div>
            <div class="card__description--text"></div>
        </div> 
        <div class="card__action">
            <button class="card__action--show-details">zobacz szczegóły</button>
            <button class="card__action--select-plan">Wybierz plan</button>
        </div>
    </div>
</template>

<template class="exercise-temp">
    <div class="plan__exercise" draggable="true">
        <div class="plan__exercise--name"></div>
        <div class="plan__exercise--repat"></div>
        <div class="plan__exercise--weight"></div>
    </div>
</template>

<template class="select-element-temp">
    <div class="select-container__element" draggable="true">
        <div class="select-container__element--name">Podciąganie nachwytem</div>
    </div>
</template>

<template class="set-temp">
    <div class="plan__set" draggable="true">
        <!-- <input type="checkbox" class="plan__set--checkbox"> -->
        <div class="plan__set--name">Nogi</div>
        <button class="plan__set--btn">Dodaj Ćwiczenie do serji</button>
    </div>
</template>
<template class="empty-temp">
    <div class="empty">
        <div class="empty__title"></div>
    </div>
</template>

</body>
</html>