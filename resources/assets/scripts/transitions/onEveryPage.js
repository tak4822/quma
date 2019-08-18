export default function (
  currentStatus,
  oldStatus,
  barbaContainer,
  newPageRawHTML
) {
  // if ( Barba.HistoryManager.history.length === 1 ) {  // ファーストビュー
  //   return; // この時に更新は必要ありません
  // }

  // if (
  //   document.location.hostname !== 'localhost' &&
  //   document.location.hostname !== 'xcrap.local'
  // ) {
  //   (function (w, d, s, l, i) {
  //     w[l] = w[l] || [];
  //     w[l].push({
  //       'gtm.start': new Date().getTime(),
  //       event: 'gtm.js',
  //     });
  //     var f = d.getElementsByTagName(s)[0],
  //       j = d.createElement(s),
  //       dl = l != 'dataLayer' ? '&l=' + l : '';
  //     j.async = true;
  //     j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
  //     f.parentNode.insertBefore(j, f);
  //   })(window, document, 'script', 'dataLayer', 'GTM-KNCLD8M')

  //   // Googleアナリティクスへ送信
  //   dataLayer.push({ // eslint-disable-line no-undef
  //     'newPageUrl': location.pathname,
  //     event: 'pageLoaded',
  //   });
  // }

  window.scrollTo(0, 0); // page goes to top

  // jquery-pjaxから借りた
  const $newPageHead = $('<head />').html(
    $.parseHTML(
      newPageRawHTML.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0],
      document,
      true
    )
  );
  // 変更したいタグ(ご自身の環境に合わせて適宜変更してください)
  const headTags = [
    'link[rel="canonical"]',
    'link[rel="shortlink"]',
    'link[rel="alternate"]',
    'meta[name="description"]',
    'meta[property^="og"]',
    'meta[name^="twitter"]',
    'meta[name="robots"]',
  ].join(',');
  $('head')
    .find(headTags)
    .remove(); // タグを削除する
  $newPageHead.find(headTags).appendTo('head'); // タグを追加する

  const script = barbaContainer.querySelector('script');
  if (script !== null) {
    eval(script.innerHTML); // execute inline script
  }

  // const instEmbed = document.querySelector('.instagram-media');
  // if (instEmbed !== null) {
  //   window.instgrm.Embeds.process(); // execute instagram script
  //   // instEmbed.style.margin = '0 auto';
  // }
}
