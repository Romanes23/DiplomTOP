<form action="index.php?page=4" method="POST" class="col-lg-6 col-md-12 col-sm-12 ">


    <div class="mb-3 "> <!-- Имя -->
        <label for="username" class="form-label">Укажите свои ФИО</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3"> <!-- Возраст -->
        <label for="age" class="form-label">Укажите свой возраст</label>
        <input type="number" class="form-control" id="age" name="age">
    </div>
    <div class="mb-3">
        <p>Укажите свой пол</p>
        <input type="radio" name="gender" value="male"> Мужской<br>
        <input type="radio" name="gender" value="female"> Женский<br>
    </div>
    
    <div class="mb-3 dropend">
        <p>Укажите Ваш тип занятости</p>
        <select class="form-select" name="tipezan" aria-label="Пример выбора по умолчанию">
            <option selected></option>
            <option value="IP">Индивидуальный предприниматель</option>
            <option value="SZ">Самозанятый гражданин</option>
            <option value="EM">Наемный работник</option>
        </select>
    </div>

    <div class="mb-3">
        <p>Особые группы</p>
        <p>Многодетный родитель: <input type="checkbox" name="spesgroup['many_child']" /></p>
        <p>Участник СВО: <input type="checkbox" name="spesgroup['SVO']"  /></p>
        <p>Пенсионер: <input type="checkbox" name="spesgroup['Retired']"  /></p>
    </div>

    <div class="mb-3">
        <label for="sum_of_credit" class="form-label">Укажите желаемую сумму</label>
        <input type="number" class="form-control" id="sum_of_credit" name="sum_of_credit">
    </div>

    <div class="mb-3">
        <label for="term_of_credit" class="form-label">Укажите желаемый срок в месяцах</label>
        <input type="number" class="form-control" id="term_of_credit" name="term_of_credit">
    </div>

    <div class="mb-3">
        <label for="sum_of_incom" class="form-label">Укажите Ваш доход за последние 12 мес.</label>
        <input type="number" class="form-control" id="sum_of_incom" name="sum_of_incom">
    </div>




    <button type="submit" class="btn btn-primary">Register</button>
</form>