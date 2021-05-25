use Allamvizsga;
DROP TABLE IF EXISTS Tasks;
DROP TABLE IF EXISTS Tests;
DROP TABLE IF EXISTS Sampel_Tests;
DROP TABLE IF EXISTS Sub_Categories;
DROP TABLE IF EXISTS Categories;


create table Tasks(
	id int ,
	task_id varchar(10) not null primary key,
    task_name varchar(50) not null,
    task_desc text,
    difficulty int,
    user_id int
);

create table Tests(
	id  int not null auto_increment primary key ,
    task_id varchar(10),
    test_value json
);

create table Sampel_Tests(
	id  int not null auto_increment primary key ,
    task_id varchar(10),
    test_value json
);

create table Categories(
	id int ,
    category_code varchar(2),
    class varchar(3),
    category varchar(100),
    primary key(category_code,class)
);
create table Sub_Categories(
	id int not null auto_increment primary key,
	sub_category_code varchar(2),
    sub_category varchar(100),
    sub_categories_category_code  varchar(2),
    sub_categories_class varchar(3),
    constraint foreign key (sub_categories_category_code ,sub_categories_class) references Categories(category_code,class)
);
/*Categories*/
insert into Categories(id,category_code,class,category)
values(1,"01","09","A nyelv alapvető elemei");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Kifejezések és operátorok","01","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Döntéshozó struktúrák","01","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Ismétlődő struktúrák","01","09");

insert into Categories(id,category_code,class,category)
values(2,"02","09","Elemi algoritmusok");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Összeadás , szorzás , számlálás","02","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Minimum ,maximum","02","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Egy szám számjegyei","02","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"04","Oszthatóság","02","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"05","sorozatok előállítása","02","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"06","Számrendszerek","02","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"07","Különféle feladatok","02","09");

insert into Categories(id,category_code,class,category)
values(3,"03","09","Egy dimenziós tömbök(vektorok)");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Vektorok bejárása","03","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Elemek törlése , beszúrása","03","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Bizonyos tulajdonságok tesztelése","03","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"04","Vektorok rendezése","03","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"05","Vektor alkotás","03","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"06","Bináris keresés","03","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"07","Szekvenciákkal kapcsolatos problémák","03","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"08","Jellegzetes vektorok","03","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"09","Különféle feladatok","03","09");

insert into Categories(id,category_code,class,category)
values(4,"04","09","Két dimenziós tömbök(mátrixok)");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Általános mátrixok bejárása","04","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Négyzetes mátrixok bejárása","04","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Mátrix alkotás","04","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"04","Különféle feladatok","04","09");

insert into Categories(id,category_code,class,category)
values(5,"05","09","Különféle feladatok");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Bitműveletek","05","09");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Különféle feladatok","05","09");

insert into Categories(id,category_code,class,category)
values(6,"01","10","Alprogram");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Alprogramok, amelyek értékeket térítenek vissza","01","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Alprogramok, amelyek paraméterek szerint adják vissza az értékeket","01","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Egydimenziós tömböket feldolgozó alprogramok","01","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"04","Kétdimenziós tömböket feldolgozó alprogramok","01","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"05","Alprogramok karakterláncokkal","01","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"06","Különféle feladatok","01","10");

insert into Categories(id,category_code,class,category)
values(7,"02","10","Rekurzió");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Rekurzív alprogramok","02","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Különféle feladatok","02","10");

insert into Categories(id,category_code,class,category)
values(8,"03","10","Divide et Impera");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Rendezési algoritmusok","03","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Különféle feladatok","03","10");

insert into Categories(id,category_code,class,category)
values(9,"04","10","Karakterláncok");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Karakterláncok elemi feldolgozása","04","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Előre definiált függvények karakterláncokkal","04","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Különféle feladatok","04","10");

insert into Categories(id,category_code,class,category)
values(10,"05","10","Inhomogén adatszerkezetek");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Különféle feladatok","05","10");

insert into Categories(id,category_code,class,category)
values(11,"06","10","Lineáris adatszerkezetek");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Verem","06","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Sorok","06","10");

insert into Categories(id,category_code,class,category)
values(12,"07","10","Dinamikusan kiosztott listák");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Egyszeresen láncolt listák","07","10");

insert into Categories(id,category_code,class,category)
values(13,"08","10","Különféle feladatok");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Kombinatorika","08","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Geometria","08","10");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Különféle feladatok","08","10");

insert into Categories(id,category_code,class,category)
values(14,"01","11","Backtracking");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Kombinatorika elemek","01","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Backtracking","01","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Különféle feladatok","01","11");

insert into Categories(id,category_code,class,category)
values(15,"02","11","Greedy módszer");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Különböző feladatok a greedy módszerrel","02","11");

insert into Categories(id,category_code,class,category)
values(16,"03","11","Dinamikus programozás");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Számlálási problémák","03","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Különböző dinamikus programozási feladatok","03","11");

insert into Categories(id,category_code,class,category)
values(17,"04","11","Gráfelmélet");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Elemi feladatok irányítatlan gráfokkal","04","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Irányítatlan gráfok bejárása","04","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Különböző feladatok  irányított gráfokkal","04","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"04","Súlyozott gráfok","04","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"05","Fák","04","11");

insert into Categories(id,category_code,class,category)
values(18,"05","11","Fa adatszerkezetek");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Bináris fák","05","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Kiegyensúlyozott bináris keresőfák","05","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"03","Adatszerkezetek","05","11");

insert into Categories(id,category_code,class,category)
values(19,"06","11","Különféle feladatok");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"01","Matematika","06","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code ,sub_categories_class)
values(null,"02","Geometria","06","11");

insert into Sub_Categories(id,sub_category_code,sub_category,sub_categories_category_code,sub_categories_class)
values(null,"03","Különféle feladatok","06","11");

/*Taks1*/
insert into  Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010101",'Vásarlás','Vásárláskor vettél   egy csokit x lejért, és egy üdítőt y lejért. Mennyit kellet fizetned a kasszánál?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010101",'{"value":[2,4],"result": [6]}');

insert into Tests(id,task_id,test_value)
values (null,"09010101",'{"value":[5,6],"result": [11]}');

insert into Tests(id,task_id,test_value)
values (null,"09010101",'{"value":[100,58],"result":[158]}');

insert into Tests(id,task_id,test_value)
values (null,"09010101",'{"value":[165,236],"result":[401]}');

insert into Tests(id,task_id,test_value)
values (null,"09010101",'{"value":[1657,2369],"result":[4026]}');

/*Task2*/
insert into  Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010102" ,'Alma','Van x almád és a legjobb barátod kér tőled y almát. Hány almád marad?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010102",'{"value":[4,2],"result": [2]}');

insert into Tests(id,task_id,test_value)
values (null,"09010102" ,'{"value":[10,6],"result": [4]}');

insert into Tests(id,task_id,test_value)
values (null,"09010102" ,'{"value":[653,428],"result":[225]}');

insert into Tests(id,task_id,test_value)
values (null,"09010102" ,'{"value":[1650,623],"result":[1027]}');

insert into Tests(id,task_id,test_value)
values (null,"09010102" ,'{"value":[2658,923],"result":[1735]}');

/*Task 3*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010103",'Alap műveletek','Adott két szám számoljuk ki az összegüket, különbségüket, szorzatukat és hányadosukat ',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010103",'{"value":[6,3],"result": [9,3,18,2]}');

insert into Tests(id,task_id,test_value)
values(null,"09010103",'{"value":[6,2],"result":[8,4,12,3]}');

insert into Tests(id,task_id,test_value)
values(null,"09010103",'{"value":[102,37],"result":[139,65,3774,2]}');

insert into Tests(id,task_id,test_value)
values(null,"09010103",'{"value":[324,6],"result":[330,318,1944,54]}');

insert into Tests(id,task_id,test_value)
values(null,"09010103",'{"value":[1024,64],"result":[1088,960,65536,16]}');

/*Task 4*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010104",'Vásárlás 2','Édesanyád elküld a boltba, hogy vásárolj egy tejet és egy kenyeret. A kasszánál fizetett összegnek az utolsó számjegyét megtarthatód. Mennyit pénzt tarthattál meg?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010104",'{"value":[12,4],"result": [6]}');

insert into Tests(id,task_id,test_value)
values(null,"09010104",'{"value":[53,46],"result":[9]}');

insert into Tests(id,task_id,test_value)
values(null,"09010104",'{"value":[185,49],"result":[4]}');

insert into Tests(id,task_id,test_value)
values(null,"09010104",'{"value":[1462,567],"result":[9]}');

insert into Tests(id,task_id,test_value)
values(null,"09010104",'{"value":[3465,1568],"result":[3]}');

/*Task 5*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010105",'Karácsonyfa','A karácsonyfa díszítése után észre vetted, hogy a fán van x fehér gömb kétszer annyi piros gömb van mint fehér és hárommal kevesebb zöld mint piros. Hány gömb van a fán?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010105",'{"value":[2],"result": [7]}');

insert into Tests(id,task_id,test_value)
values(null,"09010105",'{"value":[10],"result":[47]}');

insert into Tests(id,task_id,test_value)
values(null,"09010105",'{"value":[153],"result":[762]}');

insert into Tests(id,task_id,test_value)
values(null,"09010105",'{"value":[4583],"result":[22912]}');

insert into Tests(id,task_id,test_value)
values(null,"09010105",'{"value":[5488],"result":[27437]}');

/*Task 6*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010106",'Olvasás','Egy osztályban a x lány és z fiú van .Minden lány 3 míg a minden fiú 2 oldalt olvasnak naponta. Hány oldalt olvasnak n nap alatt ?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010106",'{"value":[2,1,3],"result": [24]}');

insert into Tests(id,task_id,test_value)
values(null,"09010106",'{"value":[10,20,4],"result":[280]}');

insert into Tests(id,task_id,test_value)
values(null,"09010106",'{"value":[600,200,10],"result":[22000]}');

insert into Tests(id,task_id,test_value)
values(null,"09010106",'{"value":[352,178,95],"result":[134140]}');

insert into Tests(id,task_id,test_value)
values(null,"09010106",'{"value":[460,230,50],"result":[89300]}');

/*Taks 7*/
insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010107","Park",'Sétéltál a parkban és felfigyeltél arra hogy n ösvény van mindegyik ösvényen n fa minden fán n ág minden ágon n fészek minden fészekben n madár. Hány madár van a parkban?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010107",'{"value":[2],"result": [32]}');

insert into Tests(id,task_id,test_value)
values(null,"09010107",'{"value":[5],"result":[3125]}');

insert into Tests(id,task_id,test_value)
values(null,"09010107",'{"value":[18],"result":[1889568]}');

insert into Tests(id,task_id,test_value)
values(null,"09010107",'{"value":[20],"result":[3200000]}');

insert into Tests(id,task_id,test_value)
values(null,"09010107",'{"value":[25],"result":[9765625]}');

/*Task 8*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010108",'Állatok','Egy udvarón kutyák, macskák és tyúkok vannak. Tudjuk, hogy kétszer annyi macska van mint kutya és kétszer annyi tyúk mint macska. Ha az  udvaron van n kutya akkor hány állat található az udvaron ?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010108",'{"value":[2],"result": [14]}');

insert into Tests(id,task_id,test_value)
values (null,"09010108",'{"value":[5],"result":[35]}');

insert into Tests(id,task_id,test_value)
values (null,"09010108",'{"value":[35],"result":[245]}');

insert into Tests(id,task_id,test_value)
values (null,"09010108",'{"value":[157],"result":[1099]}');

insert into Tests(id,task_id,test_value)
values (null,"09010108",'{"value":[300],"result":[2100]}');

/*Task 9*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010109",'Kamionok','Egy cégnek két típusú kamionja van : az első típusú t1 tonnát képes szálitani naponta a második típusú t2 tonnát képes szálitani .
A cég rendelkezik n első típusú es m második típusú kamionnal .Hány tonna árut tudnak sztálinista p nap alatt ?
',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010109",'{"value":[2,3,4,5,6],"result": [138]}');

insert into Tests(id,task_id,test_value)
values(null,"09010109",'{"value":[10,20,4,5,6],"result":[840]}');

insert into Tests(id,task_id,test_value)
values(null,"09010109",'{"value":[15,24,14,30,46],"result":[42780]}');

insert into Tests(id,task_id,test_value)
values(null,"09010109",'{"value":[39,47,104,264,30],"result":[493920]}');

insert into Tests(id,task_id,test_value)
values(null,"09010109",'{"value":[48,56,203,365,45],"result":[1358280]}');

/*Task 10*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010110",'Társasjáték','Rendelkezel egy pénz összeggel a boltban meglátsz egy társasjátékot ami megtetszik csak nincs elég pénzed rá. Mennyit pénzt kell meg gyűjtened, hogy megvehesd a játékot?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010110",'{"value":[10,22],"result": [12]}');

insert into Tests(id,task_id,test_value)
values(null,"09010110",'{"value":[103,249],"result":[146]}');

insert into Tests(id,task_id,test_value)
values(null,"09010110",'{"value":[264,1403],"result":[1139]}');

insert into Tests(id,task_id,test_value)
values(null,"09010110",'{"value":[654,15647],"result":[14993]}');

insert into Tests(id,task_id,test_value)
values(null,"09010110",'{"value":[1654,213993],"result":[14993]}');

/*Task 11*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010111",'Cukorka ','Egy doboz cukorka x leibe kerül. Neked van y lei-ed  van. Határozd meg hány doboz cukorkát tudsz venni a pénzedből és hány lei kell, hogy még egy doboz cukorkát vásárolhass .',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010111",'{"value":[2,6],"result": [3,2]}');

insert into Tests(id,task_id,test_value)
values(null,"09010111",'{"value":[4,9],"result":[2,3]}');

insert into Tests(id,task_id,test_value)
values(null,"09010111",'{"value":[5,49],"result":[9,1]}');

insert into Tests(id,task_id,test_value)
values(null,"09010111",'{"value":[6,135],"result":[22,3]}');

insert into Tests(id,task_id,test_value)
values(null,"09010111",'{"value":[10,326],"result":[32,4]}');

/*Task 12*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010112",'Mágikus négyet','Adott egy mágikus négyet oldalának a hossza. Határozzuk meg  mágikus számot.',2,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010112",'{"value":[3],"result": [15]}');

insert into Tests(id,task_id,test_value)
values(null,"09010112",'{"value":[4],"result":[34]}');

insert into Tests(id,task_id,test_value)
values(null,"09010112",'{"value":[10],"result":[505]}');

insert into Tests(id,task_id,test_value)
values(null,"09010112",'{"value":[150],"result":[1687575]}');

insert into Tests(id,task_id,test_value)
values(null,"09010112",'{"value":[200],"result":[4000100]}');

/*Task 13*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010113",'Marsi valuta','A Marsón  három féle pénz érme van: az első érme típus x kreditet ér a második érme típus y kreditet ér a harmadik érme típus z kreditet ér. Marslakó Marcinak n első típusú m második típusú és p harmadik típusú érméi vannak. Mennyi Marci vagyona?',2,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010113",'{"value":[1,2,3,15,20,25],"result": [130]}');

insert into Tests(id,task_id,test_value)
values(null,"09010113",'{"value":[3,5,6,10,20,30],"result":[310]}');

insert into Tests(id,task_id,test_value)
values(null,"09010113",'{"value":[14,36,5,46,91,23],"result":[4035]}');

insert into Tests(id,task_id,test_value)
values(null,"09010113",'{"value":[32,41,67,154,349,109],"result":[26540]}');

insert into Tests(id,task_id,test_value)
values(null,"09010113",'{"value":[40,56,71,100,450,654],"result":[75634]}');

/*Task 14*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010114",'Marsi születésnap','A Marsón egy év n napból áll. Marslakó Marci születésnapját ünnepli és rájött arra hogy x napja él. Hány gyertya kerül Marci tortájára?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010114",'{"value":[2,8],"result": [4]}');

insert into Tests(id,task_id,test_value)
values(null,"09010114",'{"value":[5,15],"result":[3]}');

insert into Tests(id,task_id,test_value)
values(null,"09010114",'{"value":[7,224],"result":[32]}');

insert into Tests(id,task_id,test_value)
values(null,"09010114",'{"value":[15,97410],"result":[6494]}');

insert into Tests(id,task_id,test_value)
values(null,"09010114",'{"value":[26,2615028],"result":[100578]}');

/*Task 15*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010115",'Antennak','A Marsón egy év n napból áll, egy nap m órából áll .Minden órában Marslakó Marcinak nő egy antennája . Mennyi idő után lesz x antennája Marcinak?',2,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010115",'{"value":[2,3,50],"result": [8,0,2]}');

insert into Tests(id,task_id,test_value)
values(null,"09010115",'{"value":[5,3,100],"result":[6,3,1]}');

insert into Tests(id,task_id,test_value)
values(null,"09010115",'{"value":[30,24,6570],"result":[9,3,18]}');

insert into Tests(id,task_id,test_value)
values(null,"09010115",'{"value":[194,60,26482],"result":[2,53,22]}');

insert into Tests(id,task_id,test_value)
values(null,"09010115",'{"value":[205,75,45842],"result":[2,201,17]}');

/*Task 16*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010116",'Belmagasság','Van egy h magas szoba .Hány e élű kockát lehet egymásra pakolni?',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010116",'{"value":[5,2],"result": [2]}');

insert into Tests(id,task_id,test_value)
values(null,"09010116",'{"value":[9,2],"result":[4]}');

insert into Tests(id,task_id,test_value)
values(null,"09010116",'{"value":[153,9],"result":[17]}');

insert into Tests(id,task_id,test_value)
values(null,"09010116",'{"value":[98642,27],"result":[3653]}');

insert into Tests(id,task_id,test_value)
values(null,"09010116",'{"value":[126542,94],"result":[1346]}');

/*Task 17*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010117",'Állatok 2','Egy udvaron t tyúk és b bárány van. Határozzuk meg hány fej és láb található az udvaron. ',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010117",'{"value":[2,3],"result": [5,16]}');

insert into Tests(id,task_id,test_value)
values(null,"09010117",'{"value":[10,9],"result":[19,56]}');

insert into Tests(id,task_id,test_value)
values(null,"09010117",'{"value":[457,659],"result":[1116,3550]}');

insert into Tests(id,task_id,test_value)
values(null,"09010117",'{"value":[1548,10564],"result":[12112,45352]}');

insert into Tests(id,task_id,test_value)
values(null,"09010117",'{"value":[2448,19564],"result":[22012,83152]}');

/*Task 18*/

insert into Tasks(task_id,task_name,task_desc,difficulty,user_id)
values("09010118",'Japán vonat ','Japánban a vonatok adott vagonszámmal rendelkeznek és egy vonat adót tömeget tudnak szálitani. Minden vagon ugyan akóra tömeget  szálitannak. Számoljuk ki egy vagon terhelését.',1,1);

insert into Sampel_Tests(id,task_id,test_value)
values (null,"09010118",'{"value":[10,152],"result": [1520]}');

insert into Tests(id,task_id,test_value)
values(null,"09010118",'{"value":[17,55505],"result":[3265]}');

insert into Tests(id,task_id,test_value)
values(null,"09010118",'{"value":[32,495296],"result":[15478]}');

insert into Tests(id,task_id,test_value)
values(null,"09010118",'{"value":[159,9915399],"result":[62361]}');

insert into Tests(id,task_id,test_value)
values(null,"09010118",'{"value":[291,19823793],"result":[68123]}');



