//TEST FUNCTION:
<?php

include ('db/sql_query.php');

//create users:
//user1
createUser
('admin','admin@admin',password_hash('123456789', PASSWORD_DEFAULT));


//user2
createUser
('WaffleGirl','ilove@waffles.com',password_hash('asdasdasd', PASSWORD_DEFAULT));

//user3
createUser
('Mr_potato_head','potato@head.com',password_hash('123123123', PASSWORD_DEFAULT));


//create topics
$categories=array('politics','tech','entertainment','travel');
$published=array('1','0');
$randomIndex=array_rand($categories);
$imageUrl='https://loremflickr.com/320/240?random=';

$content="
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atque haec ita iustitiae propria sunt, ut sint virtutum reliquarum communia. Duo Reges: constructio interrete. Quod cum accidisset ut alter alterum necopinato videremus, surrexit statim. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Mihi enim satis est, ipsis non satis. <strong>Aliter homines, aliter philosophos loqui putas oportere?</strong></p><blockquote><p>Quae cum dixissem, Habeo, inquit Torquatus, ad quos ista referam, et, quamquam aliquid ipse poteram, tamen invenire malo paratiores.&nbsp;</p></blockquote><ul><li>Quae si potest singula consolando levare, universa quo modo sustinebit?</li><li>Quo studio Aristophanem putamus aetatem in litteris duxisse?</li><li>Habent enim et bene longam et satis litigiosam disputationem.</li><li>Ut placet, inquit, etsi enim illud erat aptius, aequum cuique concedere.</li><li>Cur igitur, inquam, res tam dissimiles eodem nomine appellas?</li><li>Item de contrariis, a quibus ad genera formasque generum venerunt.</li></ul><p>Vitiosum est enim in dividendo partem in genere numerare. Nos cum te, M. Cum autem negant ea quicquam ad beatam vitam pertinere, rursus naturam relinquunt. Quod cum dixissent, ille contra. Ex ea difficultate illae fallaciloquae, ut ait Accius, malitiae natae sunt. Qui autem diffidet perpetuitati bonorum suorum, timeat necesse est, ne aliquando amissis illis sit miser. <i>Sed quod proximum fuit non vidit.</i></p><p>Inde sermone vario sex illa a Dipylo stadia confecimus. Quid enim necesse est, tamquam meretricem in matronarum coetum, sic voluptatem in virtutum concilium adducere? Idem adhuc; Bonum valitudo: miser morbus. Sed id ne cogitari quidem potest quale sit, ut non repugnet ipsum sibi. <strong>Sed in rebus apertissimis nimium longi sumus.</strong></p>";
for($i=0;$i<15;$i++)
{
    $image=$imageUrl. $i;
    addNewPost('This is the topic number '.($i+1),$content,$categories[array_rand($categories)],mt_rand(1,3),$image,$published[array_rand($published)]);
}


?>