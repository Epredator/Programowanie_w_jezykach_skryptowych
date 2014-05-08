import sys
from PyQt4 import QtGui, QtCore
from PyQt4.QtCore import Qt
from math import sqrt


class Example(QtGui.QMainWindow):
 def __init__(self):
  super(Example, self).__init__()
  self.initUI()

 def initUI(self):               
  self.statusBar().showMessage('Ready')
  self.setGeometry(220, 220, 220, 320)
  self.setMaximumSize(220, 320)
  self.setMinimumSize(220, 320)
  self.setWindowIcon(QtGui.QIcon('calc_ico.png'))
  
  self.setWindowTitle('Kalkulator')    
  self.show()

def main():
  app = QtGui.QApplication(sys.argv)
  ex = Example()
  sys.exit(app.exec_())

if __name__ == '__main__':
 main()



def initUI(self):               
    textEdit = QtGui.QTextEdit()
    self.setCentralWidget(textEdit)
    exitAction = QtGui.QAction(QtGui.QIcon('exit24.png'), 'Exit', self)
    exitAction.setShortcut('Ctrl+Q')
    exitAction.setStatusTip('Exit application')
    exitAction.triggered.connect(self.close)


    #names=['Cls', 'Bck', '', 'Close', '7', '8', '9', '/', '4', '5', '6', '*', '1', '2', '3', '-', '0', '.', '=', '+']

    pos = [('Cls',0,0,1,1),('Bck',0,1,1), ('ss',0,2,11), ('Close',0,3,1,1),
           ('7',1,0,1,1), ('8',1,1,1,1), ('9',1,2,1,1), ('/',1,3,1,1) ,
           ('4',2,0,1,1), ('5',2,1,1,1), ('6', 2,2,1,1), ('*',2,3,1,1),
           ('1',3,0,1,1), ('2', 3,1,1,1), ('3', 3,2,1,1), ('0',3,3,2,1),
           ('.',4,0,1,2), ('=',4,2,1,1)]
    grid = QtGui.QGridLayout()
    j = 0
    #pos = [(0,0), (0,1), (0,2), (0,3), (1,0), (1,1), (1,2), (1,3), (2,0),(2,1),(2,2),(2,3),(3,0),(3,1),(3,2),(3,3),(4,0),(4,1),(4,2),(4,3)]
    for i in pos:
        button = QtGui.QPyshButton(i[0])
        button.setMaximumWidth(400)
        button.setMinimumHeight(200)
        grid.addWidget(button, i[1], i[2], i[3], i[4])
        j = j + 1
    panel = QtGui.QWidget()
    panel.setLayout(grid)
    self.setCentralWidget(panel)
    self.move(300,150)
    
       
    
    
    
    #self.setGeometry(300, 300, 350, 250)
    self.setWindowTitle('Main window')    
    self.show()
