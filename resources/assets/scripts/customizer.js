import $ from 'jquery';

wp.customize.section.add('blogname', (value) => {
  value.bind(to => $('.brand').text(to));
});
