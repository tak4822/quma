import interviewSlider from '../modules/interviewSlider';
export default {
  namespace: 'frontpage',
  onEnter: function () {
    // このページのcontainerが読み込みを開始した時。

    // header.clearFix();
    // header.scroll();

    // if (window.matchMedia('(min-width:1000px)').matches) {
    //   frontNew.scroll();
    // }

    // frontMember();

    interviewSlider();
  },
  onEnterCompleted: function () {

  },
  onLeave: function () {
    // // 次のページへのトランジションが始まった時。
    // header.fix();
    // header.clearScroll();
  },
  onLeaveCompleted: function () {
    // このページのcontainerが完全に削除された時。
  },
};
