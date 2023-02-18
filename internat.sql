-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 18 2023 г., 06:31
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `internat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `busket`
--

CREATE TABLE `busket` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `id_promokode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `busket`
--

INSERT INTO `busket` (`id`, `id_user`, `id_product`, `size`, `amount`, `id_promokode`) VALUES
(137, 25, 18, 40, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(11, 'Фитнес и тренажеры'),
(12, 'Обувь'),
(13, 'Турники и шведские стенки'),
(14, 'Секции и тренировки'),
(15, 'Лыжи и сноуборды'),
(16, 'Ледовые коньки'),
(17, 'Хоккей с мячом, шайбой'),
(18, 'Бокс и единоборства'),
(19, 'Тяжелая атлетика'),
(20, 'Санки и тьюбинги'),
(21, 'Рюкзаки и сумки'),
(22, 'Летние товары'),
(23, 'Одежда');

-- --------------------------------------------------------

--
-- Структура таблицы `characteristic`
--

CREATE TABLE `characteristic` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_name_char` int(11) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `characteristic`
--

INSERT INTO `characteristic` (`id`, `id_product`, `id_name_char`, `value`) VALUES
(25, 16, 8, '2'),
(26, 16, 6, '1'),
(27, 16, 4, '2'),
(28, 16, 1, '2222'),
(29, 18, 2, 'Серый'),
(30, 16, 2, 'Зеленый');

-- --------------------------------------------------------

--
-- Структура таблицы `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `favourites`
--

INSERT INTO `favourites` (`id`, `id_user`, `id_product`) VALUES
(65, 25, 16),
(70, 25, 17),
(71, 25, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `mailing`
--

CREATE TABLE `mailing` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mailing`
--

INSERT INTO `mailing` (`id`, `email`) VALUES
(1, '123'),
(2, 'ggg@hhh'),
(3, 'ggg@hhh'),
(4, 'ggg@hhh'),
(5, 'ggg@hhh'),
(6, 'ggg@hh'),
(7, 'gg@gg'),
(8, 'gg@hggh'),
(9, 'gg@fgg'),
(10, 'gg@gg.com'),
(11, '1@1.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `name_characteristic`
--

CREATE TABLE `name_characteristic` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `name_characteristic`
--

INSERT INTO `name_characteristic` (`id`, `name`) VALUES
(1, 'Год выпуска'),
(2, 'Цвет'),
(3, 'Вид тренажера'),
(4, 'Максимальная скорость'),
(5, 'Максимальный вес пользователя'),
(6, 'Минимальная скорость'),
(7, 'Регулировка угла наклона'),
(8, 'Кол-во тренировочных программ'),
(9, 'Система складывания');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `shipping_methods` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '0',
  `price_itog` int(11) NOT NULL,
  `data` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `home` varchar(100) DEFAULT NULL,
  `entrance` varchar(100) DEFAULT NULL,
  `flat` varchar(100) DEFAULT NULL,
  `status_payment` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `shipping_methods`, `name`, `surname`, `telephone`, `email`, `payment_method`, `status`, `price_itog`, `data`, `street`, `home`, `entrance`, `flat`, `status_payment`) VALUES
(56, 25, 'Самовывоз', 'ggg', 'gg', 'gg', 'gg@gg', 'Онлайн оплата', '2', 117784, '04.02.2023', '', '', '', '', 0),
(57, 25, 'Курьером', 'fff', 'ff', 'fff', 'ff@ff', 'Онлайн оплата', '1', 30800, '12.02.2023', 'ggfgf', 'fff', 'fff', 'fff', 0),
(58, 25, 'Самовывоз', 'gg', 'gg', 'gg', 'gg@gg', 'Картой при получении', '0', 30800, '12.02.2023', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `id_promokode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_list`
--

INSERT INTO `order_list` (`id`, `id_order`, `id_products`, `size`, `amount`, `id_promokode`) VALUES
(35, 56, 16, NULL, 1, NULL),
(36, 56, 18, 40, 1, NULL),
(37, 56, 18, 42, 1, NULL),
(38, 57, 17, NULL, 1, NULL),
(39, 58, 17, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_sub_cat` int(11) DEFAULT NULL,
  `id_sub_sub_cat` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `article` varchar(100) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `id_category`, `id_sub_cat`, `id_sub_sub_cat`, `name`, `brand`, `article`, `description`, `amount`, `price`, `image`) VALUES
(16, 11, 4, NULL, 'Беговая дорожка Dfit Maxima X New', 'ff', '54279', 'Флагманская модель беговой дорожки из линейки X New – Dfit Maxima. Данная модель имеет четырехслойное полотно и мощный электромотор, который развивает скорость до 20 км/час. Продвинутая система амортизации с 12-ю усиленными эластомерами обеспечивает максимальный комфорт во время бега.\r\n', '6', 105990, '5d894639bfd964f40126a3881984df78.jpg'),
(17, 23, 1, NULL, 'Комбинезон COOl ZONE VOLK KN2126 асфальт-изумрудный', 'gfrhs', '61518', 'VOLK – мужской комбинезон с еще более усовершенствованной эргономикой и новой технологией пошива нагрудных карманов и карманов брюк. Теперь все молнии спрятаны под планкой, что делает ваш стиль единым и выдержанным.\r\nДанная модель оснащена продуманной системой вентиляции и защитными износостойкими вставками на коленях и по низу брюк, а также специальным карманом для скипасса на рукаве и удобными внутренними подтяжками, чтобы сбросить верх комбинезона в помещении.\r\nКомбинезон VOLK демонстрирует неклассическое применение двухцветной гаммы с вертикальным и смещенным от центра разделением.', '3', 30800, '7hbzcvxs18tx7s2evacltmji5qu8fjbd.jpg'),
(18, 12, 1, 1, 'Ботинки EDITEX ALASKA W988-1N черный', 'EDITEX', '61898', 'Верх выполнен из износостойкого материала BEPROTECK, вся обувь прошита двойной строчкой, по ранту добавлены вставки из нубука для защиты и поддержки стопы. Все детали обуви обработаны стойким водоотталкивающим составом. Внутри обуви мембрана WWB, которая вместе с эффективным утеплителем THINSULATE обеспечивают полную водонепроницаемость и удерживают тепло до -30°. Укрепленный носок и пятка предохраняют при ударах о камни. Мягкая съемная стелька ORTHOLITE обеспечивает дополнительный комфорт, а ее пористая структура с бактерицидной пропиткой предотвращает развитие бактерий и запахов. Фирменная подошва USP, состоит из слоев EVA и прочной резины, обеспечивает легкость, хорошую амортизацию и надежное сцепление с любой поверхностью, стойкость к истиранию.', '12', 6552, 'oxm63pi5iof5gymnjl89hivqkt9mzuxz.jpg'),
(19, 13, NULL, NULL, 'Навесной турник брусья (2 в1) Домашние тренажеры', 'treewfgv', '47519', 'Универсальный навесной турник с брусьями для многофункциональных тренировок в домашних условиях. Простая система крепления на шведской стенке не требует отдельного места под тренажер. Вы сможете без труда подобрать нужную высоту под каждого члена семьи или быстро убрать турник при необходимости. Турник с тремя видами хвата и брусья позволяют проработать большое количество мышц рук, спины и брюшного пресса. Турник имеет регулировку вылета от шведской стенки для комфортного подтягивания, как подростков, так и взрослых. В конструкции предусмотрены крепления для подвеса груши, эластичной ленты или боевого снаряда. Турник изготовлен из высокопрочных материалов и обработан полимерно-порошковым покрытием. Максимальная весовая нагрузка составляет до 250 кг. Удобные прорезиненные ручки не натирают пальцы рук и обеспечивают крепкий хват.', '0', 3190, 'pzg1d2rivqd0lxvzjw74drgg4et6n8y0.jpg'),
(20, 14, NULL, NULL, 'Круг Bestway с ручками в полоску 36010 91см', 'ajhtrsa', '49971', 'Детский круг для плавания от бренда Bestway выполнен в яркой необычной расцветке. Такой дизайн придется по вкусу мальчикам и девочкам, а также поможет оставаться всегда на виду. Круг не только позволяет научиться плавать и избежать страха воды у ребенка, но и подходит для активных игр и отдыха на берегу. Боковые пластиковые ручки обеспечивают комфорт и безопасность ребенка во время плавания. Круг с диаметром 910 мм подойдет детям от 9 лет и выдерживает максимальный вес до 60 кг. Внутренняя часть круга лишена грубых швов, которые могут натирать кожу во время нахождения в воде. Усиленный виниловый материал, из которого выполнена модель, отличается прочностью и устойчивостью к ультрафиолетовому излучению, сохраняя превосходный внешний вид в течение многих лет. Удобный клапан обеспечит лёгкое надувание изделия и предотвратит сдувание, даже если он открыт. В сдутом виде, круг практически не занимает места и поместится в любой рюкзак.', '14', 680, 'e77b5d79195f58c458380cfccb71298c.jpg'),
(21, 15, NULL, NULL, 'Горные лыжи Rossignol Pursuit 100 с креплениями', 'fewhre', '22342', 'Горные лыжи Pursuit 100 подойдут для начального или среднего уровня и предназначены для карвингового катания по подготовленным трассам. Технология Power Turn Rocker обеспечивают лёгкий вход в поворот и стабильность на протяжении всего спуска, а за счет перфорированной пятки и носка обеспечивается адаптивная торсионная жесткость. В совокупности эти два показателя улучшают характеристики виброгашения и эластичности лыжи, делая катание легким и комфортным.', '20', 33990, '400b8b483983db9e38426e40d82ce9c3.jpg'),
(22, 16, NULL, NULL, 'Коньки BIG BRO PW-206АК хоккейные', 'ktdhrea', '59467', 'Обувь хоккеиста – одна из важнейших частей экипировки, которая влияет на безопасность, эффективность игры. Неверная покупка может привести к дискомфорту, быстрой поломке продукции, пустой трате времени. Корпус ботинка BIG BRO выполнен из тканевого материла со вставками с искусственной кожи. Особая конструкция улучшает поддержку, создаёт анатомическую посадку, а материал делает ботинок лёгким и воздухопроницаемым. Подкладка из нейлона отлично выводит влагу и создаёт высокий уровень комфорта. Жесткий ботинок обеспечивает оптимальный уровень защиты, устойчивость и поддержку. Конструкция внутреннего языка состоит из двух частей обеспечивает более анатомическую форму и удобно охватывает ногу вокруг голеностопа. Внутренняя стелька EVA способствует комфортному положению стопы внутри ботинка. Модель оснащена острым лезвием из нержавеющей стали. Эти коньки позволят совершать резкие манёвры на льду и развить высокую скорость.', '134', 3592, 'wiz2k332d85o44ft1iho9l21xo9g94m5.jpg'),
(23, 17, NULL, NULL, 'Шлем игрока хоккейный RGX черный', 'eraak', '61930', 'Хоккейный шлем игрока с маской необходим хоккеисту для защиты головы и лица от повреждений, которые он может получить во время игры или тренировки. Шлем изготовлен из ударопрочного морозостойкого пластика. Подшлемник из вспененного EVA отлично держит форму и надежно защищает голову от ударов благодаря своей способности рассеивать удар, смягчая его силу.', '2', 2232, 'a85ca5c3e9064291cce70ce62ba95405.jpg'),
(24, 18, NULL, NULL, 'Перчатки Everlast тренировочные PU Pro Style Elite 10oz', 'aher54jr', '60316', 'Перчатки боксерские \"Pro Style Elite\" - это тренировочные боксерские перчатки для спаррингов и работы на снарядах. Изготовлены из качественной искусственной кожи с применением технологий Everlast, использующихся в экипировке профессиональных спортсменов. Благодаря выверенной анатомической форме перчатки надежно фиксируют руку и гарантируют защиту от травм. Нижняя часть, полностью изготовленная из сетчатого материала, обеспечивает циркуляцию воздуха и препятствует образованию влаги, а также неприятного запаха за счет антибактериальной пропитки Everfresh.\r\nКомбинация легких дышащих материалов поддерживает оптимальную температуру тела.\r\nМодель подходит для начинающих боксеров, которые хотят тренироваться с экипировкой высокого класса.', '6', 2190, '3i5nu4nqgkl7uvpuik9r3g4vomgtdrud.jpg'),
(25, 19, NULL, NULL, 'Гиря 12 кг пластик', 'JREAHER', '59838', 'Пластиковая гиря имеет ряд преимуществ перед классическими чугунными гирями, она приятнее на ощупь, имеет точный вес и не нуждается в подготовке поверхности пола. Пластиковая гиря предназначена для тренировок в домашних условиях, на улице или тренировочных залах. Гиря поможет развить физическую силу и выносливость организма в целом. Внутри снаряд заполнен песком, за счет которого придается нужный вес. Новичкам рекомендуется выбрать гирю 6-8 кг, 10 кг для девушек и 12-16 кг для более опытных спортсменов.', '66', 1752, '1cnpvbkhjp7jjkn1wvja87lsxt4bqv1z.jpg'),
(26, 20, NULL, NULL, 'Сноубот V76 двухместный', 'ljhtrs', '57465', 'Мягкие и компактные, эти санки ледянки созданы для комфортного и скоростного катания со снежной горки.\r\nЛегкий вес, минимум места и наличие ручек позволяет перевозить ледянку в общественном транспорте и без проблем хранить дома.\r\nРазмер санок ледянок рассчитан на удобную посадку седока вместе с ногами (чтобы не держать их навесу).\r\nЭта мягкая ледянка имеет верх выполненный из ткани полиэстер PU с дизайнерским необычным рисунком.\r\nНиз - из армированного автотента PVC с глянцевой, гладкой поверхностью, обладающей хорошим скольжением.\r\nЛедянка мягкая снабжена двумя удобными ручками.\r\nВ качестве наполнителя используется вспененный пружинящий полимер.\r\nГабариты: длина 120 см., ширина 68 см., толщина 4,5 см.', '11', 1431, 'sz9qphj2pk3uuktnecfam7naixk675tc.jpg'),
(27, 21, NULL, NULL, 'Сумка Regatta Packaway Duff 60L EU179', 'mjrsaer', '50712', 'Увеличенная спортивная сумка Regatta Packaway Duff с объемом в 60 литров подходит, как для занятий спортом, так и путешествий. Благодаря увеличенному объему, вы сможете вместить все необходимые вещи для тренировки. Выполнена из облегченной ткани с вафельной текстурой, сумка отличается повышенной прочностью и влагоотталкивающими свойствами. Сумка застегивается на двустороннюю молнию и имеет широкий проем, в который удобно складывать вещи. С центральной боковой стороны имеет большой передней карман на молнии. Удобные нейлоновые ручки можно соединить вместе для комфортной переноски. Широкая плечевая лямка регулируется под ваш рост. Две дополнительные ручки по бокам служат как альтернативный вариант переноски. По центру расположен большой фирменный логотип бренда Regatta.', '64', 2800, 'a17e1ac3384479897a6d3b84f0c2dff2.jpg'),
(28, 22, NULL, NULL, 'Велосипед CUBE Acid 29, рама 20', 'nrtsjvbe', '59685', 'Высококачественный современный велосипед от бренда Cube – это усовершенствованная и переработанная модель велосипеда Acid, который отлично подойдет как новичкам, так и уже опытным велосипедистам. Стильный и надежный современный велосипед-хардтейл предназначен для езды в стиле кросскантри, подходит для катания по легкому бездорожью в лесу или в поле, а также для спокойного катания по городу и в парке. Рама велосипеда выполнена из облегченного алюминия, который обеспечивает высокую прочность при максимально низком весе. Благодаря гидроформовке труб достигается высокая прочность конструкции, а внутренняя проводка тросов позволяет сократить затраты на обслуживание, при этом дизайн велосипеда остается аккуратным. Обновленная геометрия велосипеда включает в себя нижнюю верхнюю трубу и коническую рулевую трубу, что обеспечивает улучшенную управляемость. Амортизационная вилка хорошо поглощает вибрации и сглаживает ударную нагрузку во время езды по неровной дороге. Велосипед оснащен колесами диаметром 29 дюймов, которые позволяют быстро набирать скорость. Качественные покрышки обеспечивают хороший накат и оптимальное сцепление с дорогой во время катания. Износоустойчивые дисковые гидравлические тормоза обеспечивают быстрое и надежное торможение даже на мокрой дороге. Благодаря удобным грипсам руки не соскальзывают с руля во время катания, что обеспечивает больший контроль велосипеда. Велосипед имеет 12 скоростных передач.', '1', 177480, 'cpa9kftv09h0891hxpgaohhv2m1y460q.jpg'),
(29, 12, 1, 1, 'бот', 'EDITEX', '123', 'рпрпарапрапрап', '12', 127000, ''),
(30, 12, 1, 1, 'fdgsfedw', 'GG', 'dfsfsd', 'fdsfds', '11', 8000, ''),
(31, 12, 1, 1, 'рр', 'рр', 'рр', 'рр', 'рр', 20000, ''),
(32, 12, 1, 2, 'nfgxbf', 'vfdvdfnr', 'fdsbvfs', 'fdvbfds', '32', 22222, ''),
(33, 12, 1, 3, 'fghnfrgs', 'erjttreshr', 'rshntrshn', 'hrtshgre', '22', 22, ''),
(34, 12, 1, 1, 'jrtshr', 'areghtrkm', 'htrsgha', 'gbrrehntr', '33', 435444, '');

-- --------------------------------------------------------

--
-- Структура таблицы `promokode`
--

CREATE TABLE `promokode` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `promokode`
--

INSERT INTO `promokode` (`id`, `id_product`, `name`, `percent`) VALUES
(2, 18, 'gg', 0.1);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `estimation` int(11) NOT NULL,
  `plus` varchar(5000) NOT NULL,
  `minus` varchar(5000) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `id_prod`, `estimation`, `plus`, `minus`, `comment`, `date`) VALUES
(2, 25, 16, 4, 'lorem', 'hghghghg', 'hghghghg', '07.01.2023'),
(3, 26, 16, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore officiis porro aperiam repellat dignissimos officia provident beatae recusandae nisi laudantium, quisquam voluptas in velit, fuga rerum fugiat nam, voluptatibus odio!', '07.01.2923'),
(4, 28, 16, 5, 'luyegtfdhrdhtrshtr', 'htrjhhtrhjtrhtrhgre', 'hrthrthtrhtrhrt', '07.02.2923'),
(5, 25, 22, 2, 'fdfd', 'fdfd', 'fdfd', '07.01.2023'),
(6, 25, 26, 5, 'gg', 'gg', 'gg', '07.01.2023');

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`id`, `id_product`, `size`, `amount`) VALUES
(1, 18, 38, 0),
(2, 18, 40, 3),
(3, 18, 42, 4),
(15, 18, 36, 2),
(16, 18, 37, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcategory`
--

INSERT INTO `subcategory` (`id`, `id_category`, `name`) VALUES
(1, 12, 'Мужчинам'),
(2, 12, 'Женщинам'),
(3, 12, 'Детям'),
(4, 11, 'Тренажеры'),
(5, 11, 'Инвентарь для фитнеса');

-- --------------------------------------------------------

--
-- Структура таблицы `sub_subcategory`
--

CREATE TABLE `sub_subcategory` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_subcategory` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sub_subcategory`
--

INSERT INTO `sub_subcategory` (`id`, `id_category`, `id_subcategory`, `name`) VALUES
(1, 12, 1, 'Ботинки'),
(2, 12, 1, 'Сапоги'),
(3, 12, 2, 'Кроссовки и кеды');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `tel_user` varchar(100) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `surname_user` varchar(100) DEFAULT NULL,
  `inn_user` varchar(100) DEFAULT NULL,
  `street_user` varchar(100) DEFAULT NULL,
  `city_user` varchar(100) DEFAULT NULL,
  `region_user` varchar(100) DEFAULT NULL,
  `postal_code_user` varchar(50) DEFAULT NULL,
  `country_user` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email_user`, `password_user`, `tel_user`, `name_user`, `surname_user`, `inn_user`, `street_user`, `city_user`, `region_user`, `postal_code_user`, `country_user`, `status`) VALUES
(25, '1@1', 'b7f09f1a6db323a068da2d0353e2e757', '1', '12', 'inan2', '', '', '', '', '', '', 1),
(26, '2@2', 'b0829550b12f25d631246a64d47579e6', '2', '2', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(27, '', '45c86ad9a683cc4a5d86f1925f2715f5', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0),
(28, '3@3', 'a9d54f117d29d50e19a7797f3afb890a', '3', '3', 'ggg', '', '', '', '', '', '', 0),
(29, '4@4', '886904085b401ff3c8643ba7fc8afbb0', '4', '4', NULL, '', NULL, NULL, NULL, NULL, NULL, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `busket`
--
ALTER TABLE `busket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `characteristic`
--
ALTER TABLE `characteristic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_name_char` (`id_name_char`);

--
-- Индексы таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `mailing`
--
ALTER TABLE `mailing`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `name_characteristic`
--
ALTER TABLE `name_characteristic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_products` (`id_products`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_sub_cat` (`id_sub_cat`),
  ADD KEY `id_sub_sub_cat` (`id_sub_sub_cat`);

--
-- Индексы таблицы `promokode`
--
ALTER TABLE `promokode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `sub_subcategory`
--
ALTER TABLE `sub_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subcategory` (`id_subcategory`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `busket`
--
ALTER TABLE `busket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `characteristic`
--
ALTER TABLE `characteristic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `mailing`
--
ALTER TABLE `mailing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `name_characteristic`
--
ALTER TABLE `name_characteristic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `promokode`
--
ALTER TABLE `promokode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sub_subcategory`
--
ALTER TABLE `sub_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `busket`
--
ALTER TABLE `busket`
  ADD CONSTRAINT `busket_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `busket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `characteristic`
--
ALTER TABLE `characteristic`
  ADD CONSTRAINT `characteristic_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `characteristic_ibfk_2` FOREIGN KEY (`id_name_char`) REFERENCES `name_characteristic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_sub_cat`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`id_sub_sub_cat`) REFERENCES `sub_subcategory` (`id`);

--
-- Ограничения внешнего ключа таблицы `promokode`
--
ALTER TABLE `promokode`
  ADD CONSTRAINT `promokode_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sub_subcategory`
--
ALTER TABLE `sub_subcategory`
  ADD CONSTRAINT `sub_subcategory_ibfk_1` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_subcategory_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
