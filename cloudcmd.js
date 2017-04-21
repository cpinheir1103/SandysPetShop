//https://github.com/coderaiser/cloudcmd/blob/master/HELP.md
var http = require('http');
var cloudcmd = require('cloudcmd');
var io = require('socket.io');

module.exports = {
    start: function(app, subPath) {
      const port = 1337;
      const prefix = '/cloudcmd';
      const server = http.createServer(app);
      const socket = io.listen(server, {
          path: `${prefix}/socket.io`
      });
      const config = {
          "auth"              : true,    /* enable http authentication               */
          "username"          : "cpinheir",   /* username for authentication              */
          "password"          : "cloudcmd1103",   /* password hash in sha-1 for authentication*/
          "algo"              : "sha512WithRSAEncryption", /* cryptographic algorithm */
          "editor"            : "edward", /* default, could be "dword" or "edward"    */
          "packer"            : "tar",    /* default, could be "tar" or "zip"         */
          "diff"              : true,     /* when save - send patch, not whole file   */
          "zip"               : true,     /* zip text before send / unzip before save */
          "localStorage"      : true,     /* local storage                            */
          "buffer"            : true,     /* buffer for copying files                 */
          "dirStorage"        : true,     /* store directory listing to localStorage  */
          "minify"            : false,    /* minification of js,css,html and img      */
          "online"            : true,     /* load js files from cdn or local path     */
          "open"              : false,     /* open web browser when server started     */
          "cache"             : true,     /* add cache-control                        */
          "showKeysPanel"     : true,     /* show classic panel with buttons of keys  */
          "root"              : "/app",      /* root directory                           */
          "prefix"            : "/cloudcmd",       /* url prefix                               */
          "progress"          : true,     /* show progress of file operations         */
          "htmlDialogs"       : true,     /* use html dialogs                         */
          "onePanelMode"      : false,    /* set one panel mode                       */
          "configDialog"      : false,     /* enable config dialog                     */
          "console"           : true,     /* enable console                           */
          "terminal"          : true,    /* disable terminal                         */
          "terminalPath"      : '',       /* path of a terminal                       */
      };
      const plugins = [
          __dirname + '/plugin.js'
      ];
      const filePicker = {
          data: {
              FilePicker: {
                  key: 'key',
              }
          }
      };
      // override option from json/modules.json
      const modules = {filePicker};
      app.use(cloudcmd({
          socket,  /* used by Config, Edit (optional) and Console (required)   */
          config,  /* config data (optional)                                   */
          plugins, /* optional */
          modules, /* optional */
      }));
    } 
};


