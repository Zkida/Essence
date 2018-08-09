var el = document.querySelector('.menu-icon-main'),
    // mo.js timeline obj
    timeline = new mojs.Timeline(),

    // burst animation
    tween1 = new mojs.Burst({
		parent: el,
  radius:   { 4: 19 },
  angle:    45,
  children: {
    shape:        'line',
    radius:       5,
    scale:        1,
    stroke:       '#FD7932',
    strokeDasharray: '100%',
    strokeDashoffset: { '-100%' : '100%' },
    duration:     700,
    easing:       'quad.out',
  }
    });
    // add tweens to timeline:
    timeline.add(tween1);

// when clicking the button start the timeline/animation:
el.addEventListener('mouseenter', function() {
  timeline.replay();
});
