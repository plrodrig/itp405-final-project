d3.jsonp = function(url, callback) {
    function rand() {
      var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
        c = '',
        i = -1;
      while (++i < 15) c += chars.charAt(Math.floor(Math.random() * 52));
      return c;
    }
    function create(url) {
      var e = url.match(/callback=d3.jsonp.(\w+)/),
        c = e ? e[1] : rand();
      d3.jsonp[c] = function(data) {
        callback(data);
        delete d3.jsonp[c];
        script.remove();
      };
      return 'd3.jsonp.' + c;
    }
    var cb = create(url),
      script = d3.select('head')
      .append('script')
      .attr('type', 'text/javascript')
      .attr('src', url.replace(/(\{|%7B)callback(\}|%7D)/, cb));
  };
  var _ignoreHashChange = false;
  function go(user_name) {
    d3.select("#contents")
      .html("");
    var client_id = "5ed94236ab0b46d28eb672967eb861f4"
    d3.jsonp("https://api.instagram.com/v1/users/search?callback={callback}&q=" + user_name + "&client_id=" + client_id, function(userdata) {
      var user;
      if (userdata.data.length === 0) {
        d3.select("#contents")
          .html('<div class="alert alert-danger" role="alert"><span class="label label-danger">Error!</span> Username Not Found</div>');
        return;
      }
      for (i = 0; i < userdata.data.length; i++) {
        if (userdata.data[i].username == user_name) {
          user = userdata.data[i];
        }
      }
      d3.select("#contents")
        .html('<div class="alert alert-success" role="alert"><span class="label label-success">User Found!</span> Username: <strong>' + user.username + '</strong></div>');
      d3.jsonp("https://api.instagram.com/v1/users/" + user.id + "/media/recent/?count=50&callback={callback}&client_id=" + client_id, function(mediadata) {
        if (mediadata.meta.code == 400) {
          d3.select("#contents")
            .html('<div class="alert alert-success" role="alert"><span class="label label-success">User Found!</span> Username: <strong>' + user.username + '</strong></div><div class="alert alert-danger" role="alert"><span class="label label-danger">Oh Sad!</span> User set his/her account as a private account.</div>');
          return;
        }
        var allLikes = d3.merge(mediadata.data.map(function(d) {
          return d.likes.data.map(function(e) {
            var ret = {};
            ret.photo = {
              "id": d.id,
              "thumbimg": d.images.thumbnail,
              "regularimg": d.images.standard_resolution,
              "link": d.link
            }
            ret.user = e;
            return ret;
          })
        }));
        var folded = d3.map(allLikes.reduce(function(o, d) {
            if (o[d.user.id]) {
              o[d.user.id].liked.push(d.photo)
            } else {
              o[d.user.id] = {
                user: d.user,
                liked: [d.photo]
              }
            }
            return o;
          }, {}))
          .entries()
          .sort(function(a, b) {
            return b.value.liked.length - a.value.liked.length
          })
        var margin = {
          top: 20,
          right: 0,
          bottom: 50,
          left: 0
        };
        var rowHeight = 30,
          width = 33 * rowHeight,
          height = rowHeight * folded.length;
        var wrapper = d3.select("#contents")
          .append("div")
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom)
        var rows = wrapper.selectAll(".item")
          .data(folded)
          .enter()
          .append("div")
          .attr("class", function(_, i) {
            return "item row-" + i * rowHeight;
          })
        rows.append("img")
          .attr("class", "avatar")
          .attr("src", function(d) {
            return d.value.user.profile_picture
          })
          .attr("height", rowHeight)
          .attr("width", rowHeight)
          .on("click", function(d) {
            go(d.value.user.username);
          });
        rows.append("a")
          .attr("class", "username")
          .attr("href", function(d) {
            return "https://instagram.com/" + d.value.user.username
          })
          .text(function(d) {
            return "" + d.value.user.username
          })
        rows.append("span")
          .attr("class", "like-count")
          .text(function(d) {
            return "" + d.value.liked.length
          })
        rows.selectAll(".photo")
          .data(function(d) {
            return d.value.liked
          })
          .enter()
          .append("img")
          .attr("class", "photo")
          .attr("src", function(d) {
            return d.thumbimg.url
          })
          .attr("id", function(_, i) {
            return "photo-" + rowHeight + 10 + (i * rowHeight)
          })
          .attr("width", rowHeight)
          .attr("height", rowHeight)
          .on("mouseover", function(d) {
            var popover = d3.select("#popover");
            popover.style("display", "block")
              .style("left", (d3.event.pageX+20)+"px")
              .style("top", (d3.event.pageY-320)+"px")
            popover.append("img")
              .attr("src", d.regularimg.url);
          })
          .on("mouseout", function(d) {
            var popover = d3.select("#popover");
            popover.style("display", "none")
              .html("")
          })
      });
    });
    if (window.location.hash !== "#" + user_name) {
      _ignoreHashChange = true;
      window.location.hash = user_name
      _ignoreHashChange = false;
    }
    document.getElementById("input")
      .value = user_name;
  }
  d3.select("#button")
    .on("click", function() {
      d3.event.preventDefault();
      go(document.getElementById("input")
        .value);
    });
  if (window.location.hash.length > 0) {
    go(window.location.hash.slice(1))
  } else {
    go("aydajebat")
  }
  d3.select(window)
    .on("hashchange", function hashchange() {
      if (_ignorehashchange) {
        return;
      }
      var that = d3.select(this)
        .on("hashchange", null);
      if (window.location.hash.length > 0) {
        go(window.location.hash.slice(1))
      }
      that.on("hashchange", hashchange);
    });
