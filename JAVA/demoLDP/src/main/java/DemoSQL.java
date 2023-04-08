import java.sql.*;

public class DemoSQL {
    public static void main(String[] args) {
        DAOClass daoClass=new DAOClass();
        daoClass.returnAllValues();
        //daoClass.insertNewData("Ana",24);
        daoClass.returnAllValues();
        daoClass.deleteById(21);
        daoClass.returnAllValues();
        daoClass.deleteBySpecificColumn("nume","Ana");
        daoClass.returnAllValues();
        daoClass.deleteById(15);
        daoClass.returnAllValues();
    }

}
