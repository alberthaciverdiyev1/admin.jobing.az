<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        if (DB::table('history')->where('id', '>', 0)->exists()) {
//            DB::table('history')->where('id', '>', 0)->delete();
//        }

        DB::table('abouts')->insert([
            "az_content" => "<h3>&nbsp;İpək Yolu ilə ticarət üçün bir zamanların əsas gəliş - gediş maşurutu oln Mərkəzi
                        Avrasiya şərqlə qərbi, şimalla cənub arasında tarixi kommersiya körpüsü rolunu yeniden
                        özünə qaytarmaq niyyətindədir. Azərbaycan Avrasiyanın mühüm torpaq və hava nəqliyyatı
                        dəhlizlərinin kəsişmə nöqtəsində yerləşir. Bu, düzgün istifadə edildiyi təqdirdə, onun
                        üzun-müddətli uğurunda vacib rol oynayacaq bir amildir, çünki potensial amil olaraq ölkə
                        Avropa ilə Asiya arasında yalnız kommersiya körpüsü rolunu oynamayıb , həmdə
                        &nbsp;Avrasiyada böyük paylama qovşağına çevrilə bilər. Azərbaycan regionda vacib
                        kemmersiya və nəqliyyat mərkəzlərindən birinə çevrilmək və regional inkişafa təkan verən
                        ölkə olmaq imknaına malikdir. onun yeri, &nbsp;təbii sərvətlərinin zənginliyi və dinamik
                        yeni nəsil bu perspektiv məqsədi gerçəkləşdirməyə kömək edər.<i> “ Bakı Hövsan
                            Beynəlxalq Ticarət Dəniz Limanı” ASC</i> &nbsp;12 &nbsp;iyul 1956 cı ildə fəaliyyətə
                        başlayıb. İlk illərdə limanın fəaliyyəti balıq emalı, istehsalı, konservəşdirilməsi və
                        satışından ibarət idi.&nbsp;</h3>
                    <h3>&nbsp; &nbsp; &nbsp;<i> “ Bakı Hövsan Beynəlxalq Ticarət Dəniz Limanı” ASC </i>adını
                        aldıqdan &nbsp;sonra burada &nbsp;geniş miqyaslı təmir və yenidənqurma işləri
                        aparılmışdır. &nbsp;Köhnə dəmir yolu &nbsp;yenidən qurulmuş, 60 vaqonluq yeni dalan
                        xəttlərin tikintisi prasesi davam etdirilir. Yeni konteyner meydançası və yanalma
                        körpüsü inşa edilmişdir. Müxtəlif təyinatlı anabarlar &nbsp;təmir &nbsp;edilmiş və
                        karbamit anabarı inşa edilmişdir. &nbsp;Yüklərin sürətli şəkild aşırılması məqsədi ilə
                        yeni avadanlıqlar quraşdırılmışdır. Libher, Fuchs, Hyuster, Bobcat, Komatsu, Helli
                        &nbsp;şirkətlərinin yükdaşıyıcıları, &nbsp;İveco, &nbsp;Howa, Mercedes-benz şirkətlərini
                        yük avtomobiləri, Kalmar firmasının Reach stacker konteyner daşıyıcı avadanlıqlar
                        limanın daha keyfiyyətli &nbsp;xidmət göstərməsi üçün satın alınmışdır.Limanda dəmir
                        yolu ilə yüklərin daşınmasının və yer dəyişməsi üçün iki ədəd lokomotiv fəaliyyət
                        göstəriri. &nbsp;İşçi heyətinin müvəqqəti yaşaması üçün yataqxana və yaşayış yerləri,
                        müştəri üçün muasir ofislər və digər obiyektlər inşa edilmişdir. <i>“ Bakı Hövsan
                            Beynəlxalq Ticarət Dəniz Limanı ” </i>ASC Xəzər yanı ölkələrin &nbsp;Rusiyya,
                        Qazaxıstan, Türkmənistan, İran limanları ilə yüklərin daşınmasın keçirir, eyni zmanda
                        Türkiyə, Gürcüstan və digər ölkələrə yük daşınmasın ilə bağlı transit xidmətlər
                        göstəririk. <i>“ Bakı Hövsan Beynəlxalq Ticarət Dəniz Limanı ” ASC </i>“ Transxəzər
                        Beynəlxalq Nəqliyyat Marşrutu” Beynəlxalq Assosiyyasının üzvüdür.&nbsp;</h3>",
            "ru_content" => "<h3>&nbsp;Центральная Евразия, когда-то являвшаяся основным маршрутом для торговли по Шелковому пути,
                                намерена вновь стать историческим коммерческим мостом между Востоком и Западом, Севером и Югом.
                                Азербайджан расположен на пересечении важных сухопутных и воздушных транспортных коридоров Евразии.
                                Это фактор, который при правильном использовании сыграет важную роль в его долгосрочном успехе,
                                поскольку страна, являясь потенциальным фактором, может не только быть коммерческим мостом между
                                 Европой и Азией, но и превратиться в крупный распределительный узел в Евразии. Азербайджан имеет
                                  возможность стать одним из ключевых коммерческих и транспортных центров региона и страной,
                                   способствующей региональному развитию. Его местоположение, богатство природных ресурсов и
                                   динамичное новое поколение помогут осуществить эту перспективную цель.
                                   <i>«Бакинский Ховсанский Международный Торговый Морской Порт» ОАО</i>
                                   начал свою деятельность 12 июля 1956 года. В первые годы работы порта его
                                   деятельность заключалась в переработке, производстве, консервировании и продаже рыбы.&nbsp;</h3>
                             <h3>&nbsp; &nbsp; &nbsp;<i>«Бакинский Ховсанский Международный Торговый Морской Порт» ОАО</i>
                             после получения своего названия здесь были проведены масштабные ремонтные и реконструкционные работы.
                              Была реконструирована старая железная дорога, продолжается строительство новых тупиковых путей для 60
                              вагонов. Построены новая контейнерная площадка и причальная линия. Различные типы складов были
                               отремонтированы, а также построен карбамидный склад. Для быстрой перегрузки грузов установлено
                               новое оборудование. Закуплены грузоподъемные устройства компаний Libher, Fuchs, Hyuster, Bobcat,
                                Komatsu, Helli, грузовые автомобили компаний Iveco, Howa, Mercedes-benz, а также контейнерные
                                 перевозочные устройства Reach stacker фирмы Kalmar для обеспечения более качественного обслуживания
                                 порта. Для транспортировки и перемещения грузов по железной дороге функционируют два локомотива.
                                 Построены общежития и жилые помещения для временного проживания персонала, современные офисы для
                                  клиентов и другие объекты. <i>«Бакинский Ховсанский Международный Торговый Морской Порт»</i>
                                  ОАО осуществляет перевозку грузов с портами прикаспийских стран, таких как Россия, Казахстан,
                                  Туркменистан, Иран, а также оказывает транзитные услуги по перевозке грузов в Турцию, Грузию и
                                   другие страны. <i>«Бакинский Ховсанский Международный Торговый Морской Порт»</i>
                             ОАО является членом Международной Ассоциации «Транскаспийский Международный Транспортный Маршрут».&nbsp;</h3>
                            ",
            "en_content" => "<h3>&nbsp;Central Eurasia, once the main route for trade along the Silk Road,
                             aims to reclaim its role as a historic commercial bridge between East and West, North and South.
                              Azerbaijan is located at the intersection of important land and air transport corridors in Eurasia.
                              This is a factor that, if properly utilized, will play a crucial role in its long-term success,
                              as the country has the potential to not only serve as a commercial bridge between Europe and Asia but
                               also become a major distribution hub in Eurasia. Azerbaijan has the opportunity to become one of the key
                                commercial and transport centers in the region and a country that drives regional development. Its location,
                                wealth of natural resources, and dynamic new generation will help achieve this ambitious goal.
                                <i>“Baku Hovsan International Trade Sea Port” JSC</i> started operations on July 12, 1956. In its
                                 early years, the port’s activities included fish processing, production, canning, and sales.&nbsp;</h3>
                            <h3>&nbsp; &nbsp; &nbsp;After receiving the name <i>“Baku Hovsan International Trade Sea Port” JSC</i>,
                            extensive repair and reconstruction work was carried out here. The old railway was reconstructed, and the
                            construction of new dead-end tracks for 60 wagons is ongoing. A new container yard and docking pier have
                            been built. Various types of warehouses have been repaired, and a urea warehouse has been constructed.
                            To ensure fast cargo handling, new equipment has been installed. Cargo handling devices from companies such as
                            Libher, Fuchs, Hyuster, Bobcat, Komatsu, and Helli, as well as cargo trucks from companies like Iveco, Howa,
                             and Mercedes-Benz, and Reach Stacker container handling equipment from Kalmar have been purchased to improve
                             the quality of port services. Two locomotives are operational for transporting and moving cargo by rail.
                             Dormitories and living facilities for temporary accommodation of staff, modern offices for clients, and
                             other facilities have been built. <i>“Baku Hovsan International Trade Sea Port” JSC</i>
                             facilitates cargo transportation with Caspian countries such as Russia, Kazakhstan,
                             Turkmenistan, and Iran, while also providing transit services for cargo transportation
                             to Turkey, Georgia, and other countries. <i>“Baku Hovsan International Trade Sea Port”
                              JSC</i> is a member of the International Association of the “Trans-Caspian International
                              Transport Route.”&nbsp;</h3>",
            'page'=>'history'
        ]);
        DB::table('abouts')->insert([
            "az_content" => "<h3>&nbsp;İpək Yolu ilə ticarət üçün bir zamanların əsas gəliş - gediş maşurutu oln Mərkəzi
                        Avrasiya şərqlə qərbi, şimalla cənub arasında tarixi kommersiya körpüsü rolunu yeniden
                        özünə qaytarmaq niyyətindədir. Azərbaycan Avrasiyanın mühüm torpaq və hava nəqliyyatı
                        dəhlizlərinin kəsişmə nöqtəsində yerləşir. Bu, düzgün istifadə edildiyi təqdirdə, onun
                        üzun-müddətli uğurunda vacib rol oynayacaq bir amildir, çünki potensial amil olaraq ölkə
                        Avropa ilə Asiya arasında yalnız kommersiya körpüsü rolunu oynamayıb , həmdə
                        &nbsp;Avrasiyada böyük paylama qovşağına çevrilə bilər. Azərbaycan regionda vacib
                        kemmersiya və nəqliyyat mərkəzlərindən birinə çevrilmək və regional inkişafa təkan verən
                        ölkə olmaq imknaına malikdir. onun yeri, &nbsp;təbii sərvətlərinin zənginliyi və dinamik
                        yeni nəsil bu perspektiv məqsədi gerçəkləşdirməyə kömək edər.<i> “ Bakı Hövsan
                            Beynəlxalq Ticarət Dəniz Limanı” ASC</i> &nbsp;12 &nbsp;iyul 1956 cı ildə fəaliyyətə
                        başlayıb. İlk illərdə limanın fəaliyyəti balıq emalı, istehsalı, konservəşdirilməsi və
                        satışından ibarət idi.&nbsp;</h3>
                    <h3>&nbsp; &nbsp; &nbsp;<i> “ Bakı Hövsan Beynəlxalq Ticarət Dəniz Limanı” ASC </i>adını
                        aldıqdan &nbsp;sonra burada &nbsp;geniş miqyaslı təmir və yenidənqurma işləri
                        aparılmışdır. &nbsp;Köhnə dəmir yolu &nbsp;yenidən qurulmuş, 60 vaqonluq yeni dalan
                        xəttlərin tikintisi prasesi davam etdirilir. Yeni konteyner meydançası və yanalma
                        körpüsü inşa edilmişdir. Müxtəlif təyinatlı anabarlar &nbsp;təmir &nbsp;edilmiş və
                        karbamit anabarı inşa edilmişdir. &nbsp;Yüklərin sürətli şəkild aşırılması məqsədi ilə
                        yeni avadanlıqlar quraşdırılmışdır. Libher, Fuchs, Hyuster, Bobcat, Komatsu, Helli
                        &nbsp;şirkətlərinin yükdaşıyıcıları, &nbsp;İveco, &nbsp;Howa, Mercedes-benz şirkətlərini
                        yük avtomobiləri, Kalmar firmasının Reach stacker konteyner daşıyıcı avadanlıqlar
                        limanın daha keyfiyyətli &nbsp;xidmət göstərməsi üçün satın alınmışdır.Limanda dəmir
                        yolu ilə yüklərin daşınmasının və yer dəyişməsi üçün iki ədəd lokomotiv fəaliyyət
                        göstəriri. &nbsp;İşçi heyətinin müvəqqəti yaşaması üçün yataqxana və yaşayış yerləri,
                        müştəri üçün muasir ofislər və digər obiyektlər inşa edilmişdir. <i>“ Bakı Hövsan
                            Beynəlxalq Ticarət Dəniz Limanı ” </i>ASC Xəzər yanı ölkələrin &nbsp;Rusiyya,
                        Qazaxıstan, Türkmənistan, İran limanları ilə yüklərin daşınmasın keçirir, eyni zmanda
                        Türkiyə, Gürcüstan və digər ölkələrə yük daşınmasın ilə bağlı transit xidmətlər
                        göstəririk. <i>“ Bakı Hövsan Beynəlxalq Ticarət Dəniz Limanı ” ASC </i>“ Transxəzər
                        Beynəlxalq Nəqliyyat Marşrutu” Beynəlxalq Assosiyyasının üzvüdür.&nbsp;</h3>",
            "ru_content" => "<h3>&nbsp;Центральная Евразия, когда-то являвшаяся основным маршрутом для торговли по Шелковому пути,
                                намерена вновь стать историческим коммерческим мостом между Востоком и Западом, Севером и Югом.
                                Азербайджан расположен на пересечении важных сухопутных и воздушных транспортных коридоров Евразии.
                                Это фактор, который при правильном использовании сыграет важную роль в его долгосрочном успехе,
                                поскольку страна, являясь потенциальным фактором, может не только быть коммерческим мостом между
                                 Европой и Азией, но и превратиться в крупный распределительный узел в Евразии. Азербайджан имеет
                                  возможность стать одним из ключевых коммерческих и транспортных центров региона и страной,
                                   способствующей региональному развитию. Его местоположение, богатство природных ресурсов и
                                   динамичное новое поколение помогут осуществить эту перспективную цель.
                                   <i>«Бакинский Ховсанский Международный Торговый Морской Порт» ОАО</i>
                                   начал свою деятельность 12 июля 1956 года. В первые годы работы порта его
                                   деятельность заключалась в переработке, производстве, консервировании и продаже рыбы.&nbsp;</h3>
                             <h3>&nbsp; &nbsp; &nbsp;<i>«Бакинский Ховсанский Международный Торговый Морской Порт» ОАО</i>
                             после получения своего названия здесь были проведены масштабные ремонтные и реконструкционные работы.
                              Была реконструирована старая железная дорога, продолжается строительство новых тупиковых путей для 60
                              вагонов. Построены новая контейнерная площадка и причальная линия. Различные типы складов были
                               отремонтированы, а также построен карбамидный склад. Для быстрой перегрузки грузов установлено
                               новое оборудование. Закуплены грузоподъемные устройства компаний Libher, Fuchs, Hyuster, Bobcat,
                                Komatsu, Helli, грузовые автомобили компаний Iveco, Howa, Mercedes-benz, а также контейнерные
                                 перевозочные устройства Reach stacker фирмы Kalmar для обеспечения более качественного обслуживания
                                 порта. Для транспортировки и перемещения грузов по железной дороге функционируют два локомотива.
                                 Построены общежития и жилые помещения для временного проживания персонала, современные офисы для
                                  клиентов и другие объекты. <i>«Бакинский Ховсанский Международный Торговый Морской Порт»</i>
                                  ОАО осуществляет перевозку грузов с портами прикаспийских стран, таких как Россия, Казахстан,
                                  Туркменистан, Иран, а также оказывает транзитные услуги по перевозке грузов в Турцию, Грузию и
                                   другие страны. <i>«Бакинский Ховсанский Международный Торговый Морской Порт»</i>
                             ОАО является членом Международной Ассоциации «Транскаспийский Международный Транспортный Маршрут».&nbsp;</h3>
                            ",
            "en_content" => "<h3>&nbsp;Central Eurasia, once the main route for trade along the Silk Road,
                             aims to reclaim its role as a historic commercial bridge between East and West, North and South.
                              Azerbaijan is located at the intersection of important land and air transport corridors in Eurasia.
                              This is a factor that, if properly utilized, will play a crucial role in its long-term success,
                              as the country has the potential to not only serve as a commercial bridge between Europe and Asia but
                               also become a major distribution hub in Eurasia. Azerbaijan has the opportunity to become one of the key
                                commercial and transport centers in the region and a country that drives regional development. Its location,
                                wealth of natural resources, and dynamic new generation will help achieve this ambitious goal.
                                <i>“Baku Hovsan International Trade Sea Port” JSC</i> started operations on July 12, 1956. In its
                                 early years, the port’s activities included fish processing, production, canning, and sales.&nbsp;</h3>
                            <h3>&nbsp; &nbsp; &nbsp;After receiving the name <i>“Baku Hovsan International Trade Sea Port” JSC</i>,
                            extensive repair and reconstruction work was carried out here. The old railway was reconstructed, and the
                            construction of new dead-end tracks for 60 wagons is ongoing. A new container yard and docking pier have
                            been built. Various types of warehouses have been repaired, and a urea warehouse has been constructed.
                            To ensure fast cargo handling, new equipment has been installed. Cargo handling devices from companies such as
                            Libher, Fuchs, Hyuster, Bobcat, Komatsu, and Helli, as well as cargo trucks from companies like Iveco, Howa,
                             and Mercedes-Benz, and Reach Stacker container handling equipment from Kalmar have been purchased to improve
                             the quality of port services. Two locomotives are operational for transporting and moving cargo by rail.
                             Dormitories and living facilities for temporary accommodation of staff, modern offices for clients, and
                             other facilities have been built. <i>“Baku Hovsan International Trade Sea Port” JSC</i>
                             facilitates cargo transportation with Caspian countries such as Russia, Kazakhstan,
                             Turkmenistan, and Iran, while also providing transit services for cargo transportation
                             to Turkey, Georgia, and other countries. <i>“Baku Hovsan International Trade Sea Port”
                              JSC</i> is a member of the International Association of the “Trans-Caspian International
                              Transport Route.”&nbsp;</h3>",
            'page'=>'activity'
        ]);
    }
}
