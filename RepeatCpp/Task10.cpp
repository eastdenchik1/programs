/*
* Тема:  Повторение С++. Boost C++. 
* Автор: Свиридов Денис.
* Сайт:  https://sviridovden.ru


БиблиотекаboostC++-это собрание множества независимых библиотек, созданных независимыми разработчиками и тщательно проверенными на различных платформах.
boostобладает двумя уникальными особенностями:  1. Он имеет тесные связи с комитетом по стандартизации C++ и способен влиять на его решения. boostбыл основан членами этого комитета, и участники одного часто являются также членами другого. 2. Вдобавок к этому boostвсегда провозглашал одной из своих целей служить платформой для тестирования средств, которые могут быть добавлены в Стандарт C++. 
boostсодержит десятки библиотек, и к ним постоянно добавляются новые. Библиотеки сильно отличаются по размерам и областям применения. С одной стороны находятся библиотеки, концептуально требующие лишь нескольких строк кода.Другую крайность составляют библиотеки, представляющие настолько широкие возможности, что им можно посвящать целые книги. 
Обработка строк и текстов.Сюда входят библиотеки для безопасного по отношению к типам форматирования (по аналогии с printf), работы с регулярными выражениями, а также лексического и грамматического анализа.Контейнеры.Сюда входят библиотеки для работы с массивами фиксированной длины с STL-подобным интерфейсом, битовыми наборами произвольной длины, а также многомерными массивами.
Функциональные объекты и высокоуровневое программирование.Эта категория объединяет несколько библиотек, которые лежат в основе функциональности TR1.Математика и численные методы.Сюда входят библиотеки для работы с рациональными числами, поиска наибольшего общего делителя и наименьшего общего кратного, а также для операций со случайными числами.
Структуры данных.Сюда отнесены библиотеки для поддержки безопасных по отношению к типам объединений (то есть «любых» неоднородных типов) и библиотека кортежей, которая нашла применение в TR1.Память.Сюда входит библиотека Poolдля высокопроизводительных распределителей памяти блоками фиксированного размера а также целый ряд «интеллектуальных» указателей включая те, что вошли в TR1 (но не только). 
boostпредлагает библиотеки для решения самых разных задач, но они, конечно, не покрывают всех тем, которыми занимаются программисты. Так, например, нет библиотеки для разработки графических интерфейсов, как нет и библиотек для доступа к базам данных.

Итого
boost –очень мощная библиотека, содержащая множество библиотечек для различных нужд.•Порог вхождения очень высок, для использования boost’а нужно обладать определенными знаниями С++.•Были созданы многие аналогичные конструкции из языков C# и Java, но которых не было в С++.•Умные указатели –просто чудо.

