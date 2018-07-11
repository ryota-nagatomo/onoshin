@extends('layouts.app')

@section('cover')

<div class='top'>
        
         
  <section class="main-top">
    <p class="site-title-sub">Welcome to SmartGoals</p>
    <h1 class="site-title">     YOUR GOAL IS...</h1>
    <div class="buttons">
      <a class="button" href="#about">LEARN MORE</a>
      <a class="button button-showy" href="#contact">ABOUT US</a>
    </div>
  </section>
  
  <section class="about" id="about">
    <h2 class="heading">ABOUT THIS PRODUCT</h2>
    <p class="about-text">
     みなさんは毎日どのようなSmartGoalを設定していますか？<br>
  　　毎日違うスマートゴールを考えるのが億劫、同期がどんなゴールを目標にしているのか気になる…<br>
  　　そんなあなたの悩みを解決するアプリケーション
    </p>
    <p class="about-text">
      このアプリは皆さんの目標設定と目標管理をお手伝いさせていただくツールです。<br>
      このアプリを使うことで毎日の日報制作が効率的に、また、生産性のある目標を立てることができます。
    </p>
  </section>

  <section class="skills">
    <h2 class="heading">HOW TO USE</h2>
    <div class="skills-wrapper">
      <div class="skill-box">
        <i class="skill-icon fa fa-lightbulb-o"></i>
        <div class="skill-title">GRAPH</div>
        <p class="skill-text">
          Ⅰ，グラフでわかる達成度<br>
          毎日のSmartGoalの達成度をグラフで確認して<br>
          モチベーションアップ!!
        </p>
      </div>
      <div class="skill-box">
        <i class="skill-icon fa fa-paint-brush"></i>
        <div class="skill-title">SEARCH</div>
        <p class="skill-text">
         Ⅱ，自己成長につなげる<br> 
         目標にしたい同期のSmartGoalや<br>
          同期が頑張っていることを参考にできる<br>
          
        </p>
      </div>
      <div class="skill-box">
        <i class="skill-icon fa fa-code"></i>
        <div class="skill-title">EFFICIENCY</div>
        <p class="skill-text">
         Ⅲ， 日報作成の効率化<br>
         他の日と比較しながら今日のSmartGoalを決めて<br>
          スムーズに日報作成
         
        </p>
      </div>
    </div>
  </section>
  <section class="contact" id="contact">
    <h2 class="heading">ABOUT US</h2>
     <p class="contact-text">
       purple tribe<br>
       チームきりんさん<br>
       
       RYO　ISSEI　HIRO　SUE　KANAKO　ONOSHIN
    
    </p>
  
  </section>

</div>  

@endsection