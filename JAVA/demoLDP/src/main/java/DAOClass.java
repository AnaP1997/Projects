import java.sql.*;

public class DAOClass implements DAOInterface{
    public Statement createStatement() throws SQLException {
        Connection connection= DriverManager.getConnection("jdbc:mysql://localhost:3306/demoldp","root","free");
        Statement statement= connection.createStatement();
        return statement;
    }


    @Override
    public void returnAllValues() {
        ResultSet resultSet = null;
        try {
            resultSet = createStatement().executeQuery("SELECT * FROM student");
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }

        while (true){
            try {
                if (!resultSet.next()) break;
            } catch (SQLException e) {
                throw new RuntimeException(e);
            }
            try {
                System.out.println(resultSet.getInt(1)+" "+resultSet.getString(2)+" "+resultSet.getInt(3));
            } catch (SQLException e) {
                throw new RuntimeException(e);
            }
        }

    }

    @Override
    public void insertNewData(String nume, int grupa) {
        try {
            createStatement().executeUpdate("INSERT INTO STUDENT(nume,grupa) values('"+nume+"',"+grupa+")");
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }

    }

    @Override
    public void deleteById(int id) {
        try {
            createStatement().executeUpdate("Delete from student where idstudent="+id);
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }
    public void deleteBySpecificColumn(String columnName,String condition){

        try {
            createStatement().executeUpdate("DELETE from student where "+columnName+"='"+condition+"'");
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }



    @Override
    public void updateById(int id) {
deleteBySpecificColumn("id",""+id+"");
    }
}
