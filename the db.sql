-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Eyl 2022, 21:09:08
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `lang`, `name`, `order`) VALUES
(1, 1, 'Siyasət', 2),
(2, 1, 'İqtisadiyyat', 3),
(3, 1, 'Cəmiyyət', 4),
(4, 1, 'Şou-Biznes', 5),
(5, 1, 'Müharibə', 6),
(6, 1, 'İdman', 7),
(7, 1, 'Kriminal', 8),
(8, 1, 'Mədəniyyət', 9),
(9, 1, 'DÜNYA', 10),
(10, 1, 'AVTO-MOTO', 11),
(11, 1, 'İKT', 12),
(12, 1, 'TURİZM', 13),
(13, 1, 'MARAQLI', 14),
(14, 1, 'MÜSAHİBƏ', 15),
(15, 1, 'BAKU TV', 16),
(16, 1, 'CİNEMAPLUS', 17),
(17, 2, 'Политика', 2),
(18, 2, 'Экономика', 3),
(19, 2, 'Общество', 4),
(20, 2, 'Война', 5),
(21, 2, 'Шоу-бизнес', 6),
(22, 2, 'Спорт', 7),
(23, 2, 'Криминал', 8),
(24, 2, 'Культура', 9),
(25, 2, 'В МИРЕ', 10),
(26, 2, 'АВТО-МОТО', 11),
(27, 2, 'ИКТT', 12),
(28, 2, 'ТУРИЗМ', 13),
(29, 2, 'ЭТО ИНТЕРЕСНО', 14),
(30, 2, 'ИНТЕРВЬЮ', 15),
(31, 2, 'БАКУ ТВ', 16),
(32, 2, 'CINEMAPLUS', 17),
(33, 1, 'Ana Səhifə', 1),
(34, 2, 'Главная', 1),
(35, 1, 'hello', 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Azerbaijan'),
(2, 'Russian');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `like_count` int(11) NOT NULL,
  `dislike_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `img` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `category`, `like_count`, `dislike_count`, `view_count`, `title`, `text`, `date`, `img`) VALUES
(1, 1, 10, 3, 54, 'Pelosi Ermənistanın KTMT-dən çıxmasına eyham vurdu\r\n', '<p>ABŞ Konqresinin Nümayəndələr Palatasının spikeri Nensi Pelosi bildirib ki, Birləşmiş Ştatlar Ermənistanın Kollektiv Təhlükəsizlik Müqaviləsi Təşkilatına (KTMT) üzvlüyü və ölkənin qurumdan çıxma ehtimalına münasibət bildirmir.</p>\r\n\r\n<p>“Ermənistanda demokratiyanın inkişafı bütün demokratik dünya tərəfindən müsbət qarşılanır. Biz Ermənistanın digər təşkilatlarla təmaslarını şərh etmirik, lakin Ermənistanın təhlükəsizlik məsələləri bizim üçün önəmlidir. Qərarları Ermənistan verir. Biz yalnız bu işə töhfə vermək istəyimizdən danışa bilərik”, – Pelosi İrəvanda mətbuat konfransı zamanı deyib.</p>\r\n\r\n<p>Nümayəndələr Palatasının sədri əlavə edib ki, Ermənistanın Minilliyin Çağırış Proqramına qoşulması məsələsi müzakirə olunur.</p>\r\n\r\n<p>Qeyd edək ki, spiker ABŞ-ın Ermənistanın müdafiə sahəsində “ehtiyaclarını eşitməyə” hazır olduğunu da bəyan edib.</p>\r\n\r\n<p>Mənbə: gazeta.ru</p>', '2022-09-17 08:30:34', '1.jpg'),
(2, 2, 14, 265, 1890, 'Əhalinin banklardakı əmanətləri: Milli, yoxsa xarici valyuta üst', '<p>2022-ci il iyunun 1-nə olan məlumata görə, əhalinin banklardakı əmanətlərinin 58,8 faizi milli, 41,2 faizi xarici valyutada qoyulub. Milli valyutada olan əmanətlərin məbləği əvvəlki ilin eyni dövrü ilə müqayisədə 31,4 faiz, xarici valyutada qoyulmuş əmanətlərin məbləği isə 12,1 faiz artıb. Müqayisə üçün qeyd edək ki, 2020-ci ilin mart ayında əmanətlərin 51,1 faizi xarici, 48,9 faizi isə milli valyutada qoyulmuşdu. 2018-ci ilin sentyabrına olan statistikaya əsasən isə əmanətlərin 63 faizi xarici, 37 faizi isə milli valyutada idi. Yəni zamanla milli valyutada olan əmanətlərin həcmi artır.</p>\r\n\r\n<p>Bu artım getdikcə bildirilir ki, manata inam artır, buna görə əhali əmanətlərini banklara milli valyutada yerləşdirir. Banklara yerləşdirilən əmanətlərdə manat payının artmasına şərait yaradan amillər hansılardır? Bu artım iqtisadiyyat üçün nə deməkdir?</p>\r\n\r\n<p>“Kaspi” qəzeti məsələ ilə bağlı araşdırma aparıb.</p>\r\n\r\n<p>Maliyyə və bank məsələləri üzrə ekspert Xəyal Məmmədlinin sözlərinə görə, banklarda manatla əmanətlərin həcminin artması ilə bağlı hazırkı statistika dövlətin atdığı addımlar nəticəsində əldə olunub: “2015-ci il devalvasiyası dönəmində əhalinin əksəriyyəti əmanətlərini banklara xarici valyutada yerləşdirirdi. Amma bu, dövlət, bank sektoru üçün heç də uyğun deyildi. Buna görə, milli valyutada əmanət cəlb edilməsi üçün dövlətin iqtisadi tənzimləmə alətlərindən istifadə olundu”.</p>\r\n\r\n\r\n\r\n<p>X.Məmmədli bildirdi ki, iki əsas addım əhalini manatla əmanət yerləşdirməyə stimullaşdırdı: “Onlardan biri dövlət tərəfindən sığortalanan əmanətlərdə milli valyuta üçün daha yüksək faiz dərəcəsi tətbiq olunması idi. Milli valyutada sığortalı əmanətlər üçün faiz dərəcəsi 12, xarici valyutada 2,5 faizdir. Bu da 4 dəfədən artıq fərq deməkdir. Digər məqam isə dövlət tərəfindən milli valyutanın məzənnəsinin sabitliyinin qorunub saxlanılması oldu. Milli valyutada olan əmanətlər üçün nə qədər yüksək faiz dərəcəsi tətbiq olunsa da, milli valyutanın məzənnəsi qeyri-sabit olsaydı, əhali yenə də xarici valyutada əmanətlərə üstünlük verəcəkdi. Əhali devalvasiyadan sonra əmanətlərini bir müddət xarici valyutada saxlasa da, zaman keçdikcə gördü ki, devalvasiya baş vermir, manatın məzənnəsi sabitdir, üstəlik manatla əmanətə daha çox faiz verilir. Buna görə seçimi manatla əmanət yerləşdirmək oldu”.</p>\r\n\r\n<p>İqtisadçı Murad Calalov digər iki amillə yanaşı, son vaxtlar avronun həddindən artıq dəyər itirməsinin də Azərbaycanda əhalinin əmanətlərini manatla yerləşdirməsinə təsiri olduğunu düşünür: “Baş verən hadisələr, maliyyə dünyasındakı çaxnaşmalar avronun, dolların dəyərinin düşdüyünü göstərdi. Pandemiyadan sonra dünyada qeyri-müəyyənlik baş verdi. İkinci ən böyük zərbələrdən biri də Rusiya-Ukrayna münaqişəsidir. Rusiyanın Ukraynaya təcavüzündən sonra nəzərə çarpmayacaq dərəcədə inflyasiya getməyə başladı. Avro həddindən artıq dəyərdən düşür. İnsanlar daha çox avroya inanırdılar, onun da anidən ucuzlaşması, manatın isə sabit qalması yanaşmaları dəyişdi”.</p>\r\n\r\n\r\n\r\n<p>M.Calalov əlavə etdi ki, banklar yaranmış situasiyadan istifadə etdilər, manatla əmanətlər üçün faiz artımına getdilər: “Faizlərin artması həm digər valyutada olan əmanətləri manata keçirməyə səbəb oldu, həm də əllərdə nağd şəkildə olan pulları da banklara qoymağa gətirib çıxardı”.</p>\r\n\r\n<p>İqtisadçı Xalid Kərimli deyir ki, 2015-ci il devalvasiyasında manata etibar azalsa da, 2016-cı ildən sonra zamanla bu etibar artmağa doğru getdi: “2016-cı ildən Azərbaycan fiksə edilmiş məzənnə rejimində fəaliyyət göstərir. Manat dollarla bir yerdə dəyişir. Dollar artdıqca manat da artır. Manat dollarla birgə digər valyutalara görə də kifayət qədər dəyərini artırıb. İnsanlarımız baxırlar ki, manat stabil qalır, banklar manatla əmanətlərə faizi daha çox verir. Niyə manatla yatırım etməsinlər? Tədricən insanların manata etibarı artır və bu manatla depozitlərin payında da hiss olunur”.</p>\r\n\r\n\r\n\r\n<p>X.Kərimlinin sözlərinə görə, manatla əmanətlərin artması həm ölkə iqtisadiyyatı, həm də bank sistemi üçün əhəmiyyətlidir: “İnsanlar, şirkətlər üçün manatla borc cəlb etmə imkanları artmış olur. Manat yığımları olmasa, borc götürənlər də məcburdurlar ki, borcları xarici valyutada götürsünlər. Bu da onları əlavə risklər, qeyri-müəyyənliklər qarşısında qoyur. Həm də insanlar əmanətlərini xarici valyutada saxlayanda, Mərkəzi Bank pul-kredit siyasəti həyata keçirə bilmir. Manatla əmanətlərin artması Mərkəzi Bankın pul-kredit siyasətinin effektivliyinin artmasına imkan yaradır”.</p>\r\n\r\n<p>Bununla bağlı dünya təcrübəsinə nəzər salan X.Kərimli qeyd etdi: “İnkişaf etmiş ölkələrdə əhalinin əmanətlərinin 90 faizdən çoxu, 100 faizə yaxını milli valyutalarındadır. Avropa ölkələrində yığımlar əsas avro ilə, Amerikada dollarladır. İnkişaf etmiş ölkələrdə insanlar öz valyutalarına investisiya edirlər. İnkişaf etməkdə olan, valyutası riskli olan ölkələrdə isə yığımların milli valyutada olma faizi 50 faiz üzərindədir”.</p>', '2022-09-18 13:07:22', '2.jpg'),
(3, 3, 10, 234, 1787, 'Şəmkirdə iki avtomobil toqquşdu: Xəsarət alanlar var', '<p>Şəmkirdə yol nəqliyyat hadisəsi baş verib.</p>\r\n\r\n<p>APA-nın məlumatına görə, hadisə Yeni Həyat kəndinin yaxınlığında qeydə alınıb.</p>\r\n\r\n<p>Hərəkətdə olun iki avtomobilin toqquşması zamanı bir neçə nəfərin xəsarət aldığı bildirilir. Hadisə yerinə təcili tibbi yardım briqadaları cəlb olunub.</p>', '2022-09-16 15:07:34', '3.jpg'),
(4, 3, 5, 265, 4352, 'Azərbaycanda səfərbərlik elan olunacaq mı? - RƏSMİ AÇIQLAMA', '<p>Səfərbərliyin elan olunması barədə müvafiq icra hakimiyyəti orqanının qərarı dərhal kütləvi informasiya vasitələri (KİV) ilə, bu mümkün olmadıqda isə başqa üsullarla yayılır.</p>\r\n\r\n<p>Bu barədə Axar.az-ın sorğusuna cavab olaraq Səfərbərlik və Hərbi Xidmətə Çağırış üzrə Dövlət Xidmətindən bildirilib.</p>\r\n\r\n<p>Dövlət Xidməti sosial şəbəkələrdə 10 gün ərzində ölkəmizdə səfərbərlik elan olunacağı barədə yayılan məlumatı qəti təkzib edib:</p>\r\n\r\n<p>“Səfərbərlik xidməti əhalini sosial şəbəkələrdə yayılan şayiələrə inanmamağa, yalnız rəsmi qurumlara etibar etməyə çağırır”.</p>', '2022-09-18 15:24:34', '4.jpg'),
(5, 3, 55, 14, 287, 'Həftənin ilk günü hava necə olacaq? – PROQNOZ\r\n', '<p>Bakıda və Abşeron yarımadasında hava şəraitinin dəyişkən buludlu olacağı, əsasən yağmursuz keçəcəyi gözlənilir.</p>\n\n<p>Milli Hidrometeorologiya Xidmətindən verilən məlumata görə, mülayim cənub küləyi əsəcək.</p>\n\n<p>Havanın temperaturu gecə 20-24° isti, gündüz 26-31° isti olacaq. Bakıda gecə 21-23° isti, gündüz 28-30° isti olacaq.</p>\n\n<p>Atmosfer təzyiqi 758 mm civə sütunu olacaq. Nisbi rütubət 60-65 % olacaq.</p>\n\n<p>Azərbaycanın rayonlarında əsasən yağmursuz hava şəraiti hökm sürəcək. Gecə və səhər saatlarında duman olacaq. Mülayim şərq küləyi əsəcək.</p>\n\n<p>Havanın temperaturu gecə 17-21° isti, gündüz 30-35° isti, dağlarda gecə 4-8° isti, gündüz 10-14° isti olacaq.</p>', '2022-09-15 15:21:34', '5.jpg'),
(6, 3, 43, 294, 1573, 'Bakıda qadını xəstəxanaya aparmaq üçün FHN çağırıldı', '<p>Bakıda qadını xəstəxanaya aparmaq mümkün olmayıb, xilasedicilər çağırılıb.</p>\r\n\r\n<p>Bu barədə Fövqəladə Hallar Nazirliyi (FHN) məlumat yayıb.</p>\r\n\r\n<p>Bildirilib ki, bir nəfərin xəstəxanaya aparılması zərurətinin yaranması, bununla əlaqədar həkim briqadasına müvafiq köməkliyin göstərilməsi üçün FHN-ə müraciət edilib.</p>\r\n\r\n<p>Müraciətlə əlaqədar FHN-in Xüsusi Riskli Xilasetmə Xidmətinin müvafiq xilasetmə qüvvələri çağırış ünvanına cəlb olunub. Xilasedicilərin köməkliyi ilə vətəndaş altıncı mərtəbədəki mənzildən aşağı düşürülüb və təcili tibbi yardım briqadasına təhvil verilib.​</p>', '2022-09-18 13:07:22', '6.jpg'),
(7, 6, 45, 14, 3343, 'Kevin de Brüyne Stiven Cerrarda çatdı: Rekorda isə çox var', '<p>“Mançester Siti”nin futbolçusu Kevin de Brüyne “Liverpul”un sabiq kapitanı Stiven Cerrardın İngiltərə Premyer Liqasındakı nailiyyətini təkrarlayıb.</p>\r\n\r\n<p>“Report”un məlumatına görə, 31 yaşlı yarımmüdafiəçi buna “Vulverhempton”u 3:0 hesabı ilə məğlub etdikləri VIII tur oyununda müvəffəq olub.</p>\r\n\r\n<p>Belçikalı oyunçu matçda iki məhsuldar ötürmə ilə yadda qalıb. Təcrübəli yarımmüdafiəçi Premyer Liqada assistlərin sayını 92-yə yüksəldib.</p>\r\n\r\n<p>Stiven Cerrard 504, Kevin de Brüyne isə 287 qarşılaşmada bu göstəriciyə çatıb.</p>\r\n\r\n<p>Qeyd edək ki, Premyer Liqada assist rekordu “Mançester Yunayted”in keçmiş oyunçusu Rayan Giqqzə məxsusdur. O, 162 dəfə komanda yoldaşlarına qol vurmaq üçün şərait yaradıb.</p>', '2022-09-07 15:07:34', '7.jpg'),
(8, 1, 123, 21, 6127, 'Cəlilabadın icra başçısının müavini işdən çıxıb ', '<p>Cəlilabad Rayon İcra Hakimiyyətinin başçısının müavini, İctimai-siyasi və humanitar məsələlər şöbəsinin müdiri Elnarə Həsənova vəzifəsindən azad edilib.</p>\r\n\r\n<p>“Report”un Muğan bürosunun məlumatına görə, o, öz ərizəsi ilə işdən azad edilib.</p>\r\n\r\n<p>Hələlik onun yerinə təyinat olmayıb.</p>\r\n\r\n<p>Qeyd edək ki, o, bu vəzifəyə 2019-cu ildə təyin edilmişdi.</p>\r\n\r\n', '2022-09-19 15:07:53', '8.jpg'),
(10, 9, 22, 125, 24342, 'Dünyada koronavirusla bağlı son STATİSTİKA', '<p>Dünyada 616 965 416 nəfərdə koronavirus aşkarlanıb.</p>\r\n\r\n<p>Bu barədə <strong>Oxu.Az</strong>-ın onlayn statistikasında qeyd olunur.</p>\r\n\r\n<p>Virusdan 6 530 305 xəstə ölüb, 596 508 241 nəfər sağalıb.</p>\r\n\r\n<p>Virusa yoluxma sayına görə ilk beşlikdə olan dövlətlər ABŞ (97 495 561 nəfər), Hindistan (44 534 188 nəfər), Fransa (34 893 247 nəfər), Braziliya (34 627 090 nəfər) və Almaniyadır (32 680 355 nəfər).</p>\r\n\r\n<p>Sərhəd qonşularımız arasında Rusiyada 20 382 344, Türkiyədə 16 852 382, İranda 7 542 533, Gürcüstanda 1 762 206, Ermənistanda isə 439 302 nəfərdə koronavirus aşkar edilib.</p>\r\n\r\n<p>Azərbaycanda koronavirusa yoluxan 819 338 nəfərin 9 884-ü ölüb, 807 698 xəstə müalicə olunaraq sağalıb.</p>', '2022-09-05 18:07:50', '10.jpg'),
(11, 19, 13, 22, 321, 'В Баку спасатели МЧС помогли доставить женщину в больницу\r\n', '<p>В Насиминском районе Баку спасатели Министерства по чрезвычайным ситуациям (МЧС) помогли доставить женщину в больницу.</p>\r\n\r\n<p>Как передает Report со ссылкой на пресс-службу МЧС, в ведомство поступило обращение в связи с необходимостью оказания помощи врачебной бригаде для госпитализации больной в стационар.</p>\r\n\r\n<p>В связи с этим, к месту вызова были привлечены соответствующие силы Службы спасения особого риска ведомства. Спасатели спустили гражданку из квартиры с шестого этажа и передали бригаде скорой медицинской помощи.</p>', '2022-09-14 15:07:34', '6.jpg'),
(12, 19, 233, 15, 3344, 'Обнародован прогноз погоды на завтра', '<p>19 сентября в  Баку и на Абшеронском полуострове прогнозируется переменная облачность, преимущественно без осадков, ожидается умеренный южный ветер.</p>\r\n\r\n<p>Об этом сообщили в Национальной службе гидрометеорологии Азербайджана.</p>\r\n\r\n<p>Температура воздуха на полуострове ночью составит 20-24 градуса, днем 26-31 градус тепла. В Баку ночью 21-23, днем 28-30 градусов тепла.</p>\r\n\r\n<p>Атмосферное давление составит 758 мм ртутного столба, относительная влажность - 60-65%.</p>\r\n\r\n<p>Завтра в регионах Азербайджана будет преобладать погода без осадков, ночью и утром будет туман, ожидается умеренный восточный ветер.</p>\r\n\r\n<p>Температура воздуха ночью составит 17-21, днем 30-35 градусов тепла, в горах ночью 4-8, днем 10-14 градусов тепла.</p>', '2022-09-18 18:25:18', '5.jpg'),
(13, 25, 231, 10, 4234, 'В конгрессе США призвали Пелоси уйти в отставку', '<p>Спикер палаты представителей конгресса США Нэнси Пелоси должна покинуть свой пост вне зависимости от результатов Демократической партии на предстоящих промежуточных выборах в американский парламент, считает конгрессвумен-демократ Элисс Слоткин.</p>\r\n\r\n<p>По ее словам, пришло время сменить руководителя нижней палаты конгресса.</p>\r\n\r\n<p>\"Нам пора сменить руководство в палате представителей. У нас слишком много конгрессменов из Нью-Йорка и Калифорнии в руководстве. Хотелось бы увидеть больше разнообразия\", - отметила Слоткин.</p>\r\n\r\n<p>С точки зрения конгрессвумен, Пелоси стоит уйти и дать дорогу представителям Среднего Запада - географический регион США, в который входят 12 штатов из центральной и северо-восточной части страны. Как подчеркнула Слоткин, избиратели из этой части государства нуждаются в этом.</p>\r\n\r\n<p>Источник: gazeta.ru</p>', '2022-09-09 09:31:34', '9.jpg'),
(14, 19, 342, 23, 2342, 'Уволена заместитель главы ИВ Джалилабадского района', '<p>Заместитель главы Исполнительной власти Джалилабадского района, заведующая отделом по общественно-политическим и гуманитарным вопросам Эльнара Гасанова освобождена от занимаемой должности.</p>\r\n\r\n<p>Как передает Report, она была уволена с работы по собственному заявлению.</p>\r\n\r\n<p>Отметим, что Э.Гасанова работала на этой должности с 2019 года.</p>', '2022-09-13 08:22:59', '8.jpg'),
(15, 25, 235, 324, 1424, 'Последние данные по коронавирусу в мире', '<p>По данным на утро 18 сентября, число инфицированных коронавирусом (COVID-19) в мире достигло 616 965 416.</p>\r\n\r\n<p>Как свидетельствует онлайн-статистика Oxu.Az, за весь период пандемии скончались 6 530 305 человек, выздоровел - 596 508 241.</p>\r\n\r\n<p>По числу зараженных лидируют США (97 495 561), на 2-м месте - Индия (44 534 188), 3-м - Франция (34 893 247), далее - Бразилия (34 627 090) и Германия (32 680 355).</p>\r\n\r\n<p>В России коронавирус выявлен у 20 382 344 человек, Турции - 16 852 382, Иране -  7 542 533, Грузии - 1 762 206, Армении - 439 302.</p>\r\n\r\n<p>На сегодня в Азербайджане подтверждены 819 338 случаев инфицирования COVID-19, 807 698 человека выздоровели,  9 884 - скончались.</p>', '2022-09-18 17:07:34', '10.jpg'),
(18, 10, 0, 0, 3, 'Maşın matoru üçün əsaslı şey nədir', '<p>Santexnika</p>', '2022-09-28 23:04:38', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang` (`lang`);

--
-- Tablo için indeksler `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`lang`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
