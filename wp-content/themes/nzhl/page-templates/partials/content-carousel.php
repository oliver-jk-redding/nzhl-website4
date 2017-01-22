<?php
/**
 * The template used for displaying carousel content in content-front.php
 *
 * @package some_like_it_neat
 */
?>

  <div class='frames'>

    <?php
      $frames = array(
        array(
          'title'=>'For Middle Earth',
          'caption'=>

          foreach frame in frames ?>
      <div class='frame slide-right<?php if loop.first and loop.length > 1 ?> slide-in<?php elseif loop.length == 1 ?> static<?php endif ?>'>

        {# Image #}
        <?php if site_name == 'leatherhead' ?>
          {# <div class='image-holder'> #}
            <?php if frame.link_url ?>
              <a href="{{frame.link_url}}"><div class="image" style='background-image: url("{{frame.hero_image.get_src}}");'></div></a>
            <?php else ?>
              <div class="image" style='background-image: url("{{frame.hero_image.get_src}}");'></div>
            <?php endif ?>
          {# </div> #}
        <?php else ?>
          <div class='image' style='background-image: url("{{frame.hero_image.get_src}}");'></div>
        <?php endif ?>

        {# OTM template #}
        <?php if site_name == 'otm' ?>
          <div class='caption-wrapper'>
            <div class='caption'>
              <div class='caption-text'>{{frame.caption|trim}}</div>
              <a href='{{frame.url}}'>
                <span class='button-text-r'>{{frame.button_text}}</span>
                <div class='button'>
                  <img class='arrow l' src='{{assetsPath}}/navigation/arrow-icon.svg'>
                </div>
                <span class='button-text-l'>{{frame.button_text}}</span>
              </a>
            </div>
          </div>

        {# Leatherhead template #}
        <?php elseif site_name == 'leatherhead' ?>
          <div class="text-holder">
            <div class="inner">
              <?php if frame.title ?>
                <?php if frame.link_url ?>
                  <a class="title" href="{{frame.link_url}}">{{frame.title}}</a>
                <?php else ?>
                  <p class="title" href="{{frame.link_url}}">{{frame.title}}</p>
                <?php endif ?>
              <?php endif ?>
              <?php if frame.description ?><p class="description">{{frame.description}}</p><?php endif ?>
              <?php if frame.link_url ?>
                <a class="button" href="{{frame.link_url}}">{{frame.link_text}}<img class='arrow l' src='{{assetsPath}}/navigation/arrow-icon.svg'></a>
              <?php endif ?>
            </div>
          </div>

        {# All others #}
        <?php else ?>
          <div class='caption-wrapper vam'>
            <a href='{{frame.url}}'><div class='caption'>{{frame.caption}}</div></a>
          </div>
        <?php endif ?>
      </div>
    <?php endfor ?>

    <?php if site_name == 'science-group' and frames|length > 1 ?>
      <div class='arrow-container l'>
        <img class='arrow l' src='{{assetsPath}}/navigation/arrow-right-k.png'>
      </div>
      <div class='arrow-container r'>
        <img class='arrow r' src='{{assetsPath}}/navigation/arrow-right-k.png'>
      </div>
    <?php elseif frames|length > 1 ?>
      <?php if site_name == 'otm' ?>
        <p class='pager-nav frames-{{ frames|length }}'>
          <?php for frame in frames ?><span class='pager-dot'>{{loop.index}}</span><?php endfor ?> of {{frames|length}}
        </p>
        {# <div class='paginate-nums'><?php array_search($key, array_keys($frames)); ?> of 3</div> #}
      <?php endif ?>
      <div class='arrow-container l'>
        <img class='arrow l' src='{{assetsPath}}/navigation/arrow-right.png'>
      </div>
      <div class='arrow-container r'>
        <img class='arrow r' src='{{assetsPath}}/navigation/arrow-right.png'>
      </div>
    <?php endif ?>

    {# leatherhead pagination #}
    <?php if site_name == 'leatherhead' ?>
      <p class='pager-nav frames-{{ frames|length }}'>
        <?php for frame in frames ?><span class='dot'>{{loop.index}}</span><?php endfor ?> of {{frames|length}}
      </p>
    <?php endif ?>
  </div>

  {# <?php if site_name == 'otm' ?>
    <div class='sub-section'>
      <?php for frame in frames ?>
      <div class='sub-caption'>{{frame.caption|trim}}</div>
      <a href='{{frame.url}}'>
        <div class='button'>
          <img class='arrow l' src='{{assetsPath}}/navigation/arrow-icon.svg'>
        </div>
        <span class='button-text'>{{frame.button_text}}</span>
      </a>
      <?php endfor ?>
    </div>
  <?php endif ?> #}

  {# nav/pagination #}
  <?php if site_name != 'science-group' ?>
    <?php if site_name != 'leatherhead' ?>
      <div class='nav frames-{{ frames|length }}'>
        <div class='highlight'></div>
        <table class='table'>
          <tr class='table-row'>
            <?php for frame in frames|slice(0, 5) ?>
              <?php if site_name == 'otm' ?>
                <td class='frame-tab'><span>{{frame.nav_name}}</span></td>
              <?php else ?>
                <td class='tab'><span>{{frame.nav_name}}</span></td>
              <?php endif ?>
            <?php endfor ?>
          </tr>
        </table>
      </div>
    <?php endif ?>
  <?php endif ?>

<?php endblock ?>