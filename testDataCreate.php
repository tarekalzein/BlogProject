//TEST FUNCTION:
<?php

include ('db/sql_query.php');


$categories=array('politics','tech','entertainment','travel');
$published=array('1','0');
$images=array('images/image_1.jpg','images/image_2.jpg');
$randomIndex=array_rand($categories);
$content='
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum neque a nibh venenatis dapibus. Suspendisse tempus interdum lectus, vitae finibus velit efficitur et. Suspendisse pharetra dapibus ante, eget faucibus ipsum feugiat nec. Aenean vel justo libero. In egestas urna id aliquet facilisis. Nam id neque tristique, pretium justo a, fermentum mi. Donec tincidunt, ex vitae dignissim gravida, elit dolor venenatis dui, a pulvinar ipsum velit quis libero. Donec mattis dui feugiat metus congue eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi leo nisi, ultrices non ipsum nec, scelerisque egestas quam. Nam iaculis pulvinar purus, non commodo lectus egestas quis. Etiam pulvinar ex eu sapien semper, lacinia dapibus lorem convallis. Curabitur sagittis turpis vitae velit sagittis, ac cursus nisl imperdiet. Nullam pulvinar dapibus enim, nec lobortis nisl auctor vel. Vestibulum euismod vehicula pulvinar. Vestibulum consequat arcu a augue aliquet iaculis id ac augue.

Aliquam scelerisque gravida scelerisque. Curabitur vitae odio laoreet, facilisis nisl sit amet, vehicula urna. Praesent ultricies eros eget felis iaculis efficitur. Donec rutrum aliquet velit, ut finibus urna. Cras massa urna, luctus ut nunc vel, sagittis viverra justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus libero erat, gravida eu augue sit amet, aliquam aliquet libero. In elit turpis, fermentum sit amet tempus ut, ullamcorper ac sem. Suspendisse potenti. Etiam mauris metus, pulvinar sed erat quis, condimentum semper urna. Aliquam quis lobortis odio. Donec tristique, nisl eu facilisis pulvinar, ex magna accumsan enim, non finibus sem sem a ligula.
';
for($i=0;$i<15;$i++)
{
    addNewPost('This is the topic number '.($i+1),$content,$categories[$randomIndex],'Tarek Alzein',$images[array_rand($images)],$published[array_rand($published)]);
}


?>